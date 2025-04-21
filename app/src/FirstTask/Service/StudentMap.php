<?php

namespace App\src\FirstTask\Service;

/**
 * Маппинг для преобразования исходного массива
 */
class StudentMap
{
    /**
     * Выдает преобразованный массив, в котором у каждого студента есть предметы и у предмета оценки
     *
     * @param array $data
     *
     * @return array
     */
    public static function map(array $data): array
    {
        $students = [];

        foreach ($data as [$name, $subject, $mark]) {
            if (!isset($students[$name][$subject])) {
                $students[$name][$subject] = 0;
            }

            $students[$name][$subject] += $mark;
        }

        return $students;
    }
}