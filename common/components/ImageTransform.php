<?php

namespace common\components;

use common\models\Image;
use \Imagick;

class ImageTransform
{
    const ALIGN_MIDDLE = 1;
    const ALIGN_TOP = 2;

    protected $width;
    protected $height;

    /**
     * @var Imagick
     */
    protected $resource;

    function __construct(Image $image)
    {
        if (!@class_exists('Imagick')) {
            throw new \Exception('Imagick is not installed');
        }

        $fullPath = $_SERVER['DOCUMENT_ROOT'] . '/../../upload' . $image->path;

        if (!file_exists($fullPath)) {
            throw new \InvalidArgumentException('File ' . $image->path . ' does not exists');
        }

        $MB = min(256, ceil(filesize($fullPath) / 1000000) + 128);

        try {
            $this->resource = new Imagick();
            $this->resource->setResourceLimit(Imagick::RESOURCETYPE_MEMORY, $MB);
            $this->resource->readImage($fullPath);

        } catch (\ImagickException $e) {
            throw new \RuntimeException(sprintf('Could not open path "%s"', $image->path), $e->getCode(), $e);
        }

        $this->width  = $this->resource->getImageWidth();
        $this->height = $this->resource->getImageHeight();
    }

    function __destruct()
    {
        if ($this->resource) {
            $this->resource->clear();
            $this->resource->destroy();
        }
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Изменяет размер изображения до заданных величин
     *
     * @param $width
     * @param $height
     * @return ImageTransform
     * @throws \RuntimeException
     */
    public function resize($width, $height)
    {
        if ($this->width == $width && $this->height == $height) {
            return $this;
        }

        try {
            $this->resource->resizeImage($width, $height, Imagick::FILTER_LANCZOS, 1);

            switch (true) {
                case $width < 210 && $height < 210:
                    $this->resource->sharpenImage(0, 0.65);
                    break;
                case $width < 350 && $height < 350:
                    $this->resource->sharpenImage(0, 0.4);
                    break;
                case $this->width > 2 * $width || $this->height > 2 * $height:
                    $this->resource->sharpenImage(0, 0.3);
                    break;
                case $this->width > 1.5 * $width || $this->height > 1.5 * $height:
                    $this->resource->sharpenImage(0, 0.2);
                    break;
                default:
                    $this->resource->sharpenImage(0, 0.1);
            }

            $this->width  = $this->resource->getImageWidth();
            $this->height = $this->resource->getImageHeight();
            $this->resource->setImagePage($this->width, $this->height, 0, 0);
        } catch (\ImagickException $e) {
            throw new \RuntimeException('Resize operation failed', $e->getCode(), $e);
        }

        return $this;
    }

    /**
     * Изменяет размер изображения до заданной высоты. Ширина вычисляется автоматически.
     *
     * @param $height
     * @return ImageTransform
     */
    public function resizeToHeight($height)
    {
        $ratio = $height / $this->height;
        $width = $this->width * $ratio;
        return $this->resize($width, $height);
    }

    /**
     * Изменяет размер изображения до заданной ширины. Высота вычисляется автоматически.
     *
     * @param $width
     * @return ImageTransform
     */
    public function resizeToWidth($width)
    {
        $ratio  = $width / $this->width;
        $height = $this->height * $ratio;
        return $this->resize($width, $height);
    }

    public function crop($width, $height, $align = self::ALIGN_MIDDLE)
    {
        if ($this->width == $width && $this->height == $height) {
            return $this;
        }

        $ratio = $height / $width;

        if ($ratio < ($this->height / $this->width)) {
            $newHeight = $this->width * $ratio;
            $srcY      = ($this->height - $newHeight) / 2;
            $offsetY   = 0;

            if ($align == self::ALIGN_TOP) {
                $offsetY = (abs($this->height - $newHeight) / 2) * -1;
            }

            try {
                $this->resource->cropImage($this->width, $newHeight, 0, $srcY + $offsetY);
            } catch (\ImagickException $e) {
                throw new \RuntimeException('Crop operation failed', $e->getCode(), $e);
            }
        }
        else {
            $newWidth = $this->height / $ratio;
            $offsetX  = ($this->width - $newWidth) / 2;

            try {
                $this->resource->cropImage($newWidth, $this->height, $offsetX, 0);
            } catch (\ImagickException $e) {
                throw new \RuntimeException('Crop operation failed', $e->getCode(), $e);
            }
        }

        $this->resize($width, $height);

        return $this;
    }

    public function fit($width, $height)
    {
        if ($this->height < $height && $this->width < $width) {
            return $this;
        }

        $newD = $height / $width;
        $oldD = $this->height / $this->width;

        if ($oldD > $newD) {
            $newHeight = $height;
            $newWidth  = $newHeight / $oldD;
        }
        else {
            $newWidth  = $width;
            $newHeight = $newWidth * $oldD;
        }

        $this->resize($newWidth, $newHeight);
        return $this;
    }

    public function saveJpeg($fileName, $quality = 86)
    {
        $quality = max(0, min($quality, 100));

        try {
            $this->resource->setImageFormat('jpeg');
            $this->resource->setImageCompression(Imagick::COMPRESSION_JPEG);
            $this->resource->setImageCompressionQuality($quality);
            $this->resource->setInterlaceScheme(Imagick::INTERLACE_JPEG);
            $this->resource->stripImage();

            try {
                $this->resource->optimizeImageLayers();
            } catch (\ImagickException $e) {
            }

            $this->resource->writeImage($fileName);
            chmod($fileName, 0774);
        } catch (\ImagickException $e) {
            throw new \RuntimeException('saveJpeg operation failed', $e->getCode(), $e);
        }
    }

    public function savePng($fileName, $quality = 99)
    {
        $quality = max(0, min($quality, 100));

        try {
            $this->resource->setImageFormat('png');
            $this->resource->setImageCompression(Imagick::COMPRESSION_ZIP);
            $this->resource->setInterlaceScheme(Imagick::INTERLACE_PNG);
            $this->resource->setImageCompressionQuality($quality);
            $this->resource->stripImage();
            $this->resource->optimizeImageLayers();
            $this->resource->writeImage($fileName);
            chmod($fileName, 0774);
        } catch (\ImagickException $e) {
            throw new \RuntimeException('savePng operation failed', $e->getCode(), $e);
        }
    }
}
