<?php

namespace common\models;

use Yii;
use common\components\ImageTransform;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $path
 */
class Image extends \yii\db\ActiveRecord
{
    protected $_cachePath = '/img_cache/';

    protected $_width;
    protected $_height;

    protected $_cropWidth;
    protected $_cropHeight;

    protected $_fitWidth;
    protected $_fitHeight;

    protected $url;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path'], 'required'],
            [['path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'   => Yii::t('app', 'ID'),
            'path' => Yii::t('app', 'Path'),
        ];
    }

    public function getUrl()
    {
        if (!is_null($this->url)) {
            return $this->url;
        }

        $this->url = Yii::$app->params['staticUrl'] . $this->_performOperations();
        return $this->url;
    }

    public function crop($width, $height)
    {
        $this->_cropWidth = (int)$width;
        $this->_cropHeight = (int)$height;

        if ($this->_cropWidth == 0 || $this->_cropHeight == 0) {
            $this->_cropWidth = $this->_cropHeight = null;
        }

        $this->_width = $this->_height = $this->url = null;
        return $this;
    }

    public function fit($width, $height)
    {
        $this->_fitWidth = (int)$width;
        $this->_fitHeight = (int)$height;

        if ($this->_fitWidth == 0 || $this->_fitHeight == 0) {
            $this->_fitWidth = $this->_fitHeight = null;
        }

        $this->_width = $this->_height = $this->url = null;
        return $this;
    }

    private function _getModifiedFilename()
    {
        $postfix = '';

        if (!is_null($this->_cropWidth) && !is_null($this->_cropHeight)) {
            $postfix .= '_cropped-' . $this->_cropWidth . 'x' . $this->_cropHeight;
        }

        if (!is_null($this->_fitWidth) && !is_null($this->_fitHeight)) {
            $postfix .= '_fitted-' . $this->_fitWidth . 'x' . $this->_fitHeight;
        }

        if ($postfix == '') {
            return false;
        }

        $pathInfo = pathinfo($this->path);
        $extension = $pathInfo['extension'];
        $filenameHash = md5($this->path);

        return $this->_cachePath . substr($filenameHash, 0, 3) . DIRECTORY_SEPARATOR . $filenameHash . $postfix . '.' . $extension;
    }

    private function _performOperations()
    {
        if (!$modifiedFilename = $this->_getModifiedFilename()) {
            return $this->path;
        }

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/../../upload' . $modifiedFilename)) {
            return $modifiedFilename;
        }

        try {
            $imageTransform = new ImageTransform($this);
        } catch (\Exception $e) {
            // Переделать надо потом
            return '';
        }

        if (!is_null($this->_cropWidth) && !is_null($this->_cropHeight)) {
            $imageTransform = $imageTransform->crop($this->_cropWidth, $this->_cropHeight);
        }

        if (!is_null($this->_fitWidth) && !is_null($this->_fitHeight)) {
            $imageTransform = $imageTransform->fit($this->_fitWidth, $this->_fitHeight);
        }

        $this->_width = $imageTransform->getWidth();
        $this->_height = $imageTransform->getHeight();

        // проверяем на существование целевой папки
        if (preg_match('~(.*)/([^/]+)$~', $modifiedFilename, $m)) {
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/../../upload' . $m[1])) {
                FileHelper::createDirectory($_SERVER['DOCUMENT_ROOT'] . '/../../upload' . $m[1], 0774, true);
            }
        }

        $imageTransform->saveJpeg($_SERVER['DOCUMENT_ROOT'] . '/../../upload' . $modifiedFilename, 100);

        return $modifiedFilename;
    }
}
