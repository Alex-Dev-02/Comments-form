<?php

namespace App\src\ThirdTask\Service;

/**
 * Класс для работы с данными формы
 */
class FormData
{
    /**
     * Получает данные с формы
     *
     * @return array
     */
    public static function get(): array
    {
        return [
            'title' => htmlspecialchars($_POST['title'] ?? ''),
            'author' => htmlspecialchars($_POST['author'] ?? ''),
            'text' => htmlspecialchars($_POST['text'] ?? '')
        ];
    }
}