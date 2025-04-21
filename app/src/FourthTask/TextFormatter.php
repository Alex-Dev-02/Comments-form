<?php

namespace App\src\FourthTask;

/**
 * Класс для обработки полученного текста
 */
class TextFormatter
{
    /**
     * Обрабатывает текст по определенным условиям
     *
     * @param string $text
     *
     * @return string
     */
    public function format(string $text): string
    {
        preg_match('/^.+(<\/i><\/p>)/us', $text, $headText);
        preg_match('/<p><i>.+/us', $text, $textToCut);

        $textToCut = explode(' ', implode($textToCut));
        $textToCut = array_slice($textToCut, 0, 29);
        $mainText = implode(' ', $textToCut);

        return implode($headText) . $mainText . "...";
    }
}