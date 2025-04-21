<?php

namespace App\src\ThirdTask\Service;

/**
 * Класс для работы с сессией
 */
class Session
{
    /**
     * Получает сообщение определенного типа (ошибка|успех) из сессии
     *
     * @param string $type
     *
     * @return string|null
     */
    public static function getMessage(string $type): ?string
    {
        return $_SESSION[$type] ?? null;
    }

    /**
     * Записывает сообщение определенного типа (ошибка|успех) в сессию
     *
     * @param string $type
     * @param string $message
     *
     * @return void
     */
    public static function setMessage(string $type, string $message): void
    {
        $_SESSION[$type] = $message;
    }

    /**
     * Сбрасывает сообщение определенного типа (ошибка|успех) из сессии
     * @param string $type
     *
     * @return void
     */
    public static function unsetMessage(string $type): void
    {
        unset($_SESSION[$type]);
    }
}