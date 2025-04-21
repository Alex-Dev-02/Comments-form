<?php

namespace App\src\FirstTask\Config;

/**
 * Класс для задания исходных данных
 */
class Config
{
    /**
     * Исходный массив данных
     */
    private const SAMPLE_DATA = [
        ['Иванов', 'Математика', 5],
        ['Иванов', 'Математика', 4],
        ['Иванов', 'Математика', 5],
        ['Петров', 'Математика', 5],
        ['Сидоров', 'Физика', 4],
        ['Иванов', 'Физика', 4],
        ['Петров', 'ОБЖ', 4],
    ];

    /**
     * Возвращает массив исходных данных
     *
     * @return array[]
     */
    public static function getSampleData(): array
    {
        return self::SAMPLE_DATA;
    }
}