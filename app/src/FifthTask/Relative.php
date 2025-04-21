<?php

namespace App\src\FifthTask;

use Exception;

/**
 * Класс для получения количества родственников
 */
class Relative
{
    /**
     * Получает количество сестер произвольного брата
     *
     * @param int $n
     * @param int $m
     *
     * @throws Exception
     *
     * @return int
     */
    public static function getSistersCount(int $n, int $m): int
    {
        if ($m <= 0) {
            throw new Exception('Количество братьев не может быть равно о (по условию)');
        }

        return $n > 0 ? $n + 1 : 0;
    }
}