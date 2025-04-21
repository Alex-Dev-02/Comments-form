<?php

namespace App\src\ThirdTask\Config;

/**
 * Интерфейс для хранения статуса сообщения
 */
interface MessageStatusInterface
{
    /**
     * Статус сообщения для успеха при выполнении операции
     */
    public const SUCCESS = 'success';

    /**
     * Статус сообщения для неудачи при выполнении операции
     */
    public const ERROR = 'error';
}