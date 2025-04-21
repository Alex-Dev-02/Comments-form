<?php

namespace App\src\ThirdTask\Service;

/**
 * Класс для редиректа на определенную страницу
 */
class Redirect
{
    /**
     * Совершает переход по ссылке
     *
     * @param string $url
     *
     * @return void
     */
    public static function to(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}