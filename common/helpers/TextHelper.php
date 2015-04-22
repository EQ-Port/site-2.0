<?php
namespace common\helpers;

class TextHelper
{
    /**
     * Возвращает случайную строку заданной длины
     *
     * @param int $length
     *
     * @return string
     */
    public static function getRandomString($length = 8)
    {
        $availableSymbols = ['!', '@', '#', '$', '%', '^', '-', '=', '+', '_', '*'];

        $result = '';

        for ($i = 0; $i < $length; ++$i) {
            switch (mt_rand(0,3)) {
                case 0:
                    $result .= chr(mt_rand(ord('A'), ord('Z')));
                    break;
                case 1:
                    $result .= chr(mt_rand(ord('a'), ord('z')));
                    break;
                case 2:
                    $result .= mt_rand(0, 9);
                    break;
                default:
                    $result .= $availableSymbols[array_rand($availableSymbols)];
            }
        }

        return $result;
    }
}