<?php

namespace App\src\FirstTask\Manager;

/**
 * Класс для работы с предметами
 */
class SubjectManager
{
    /**
     * Выдает полный список предметов в отсортированном виде и без дубликатов
     *
     * @param array $students
     *
     * @return array
     */
    public static function getSubjectsList(array $students): array
    {
        $subjects =  array_values(
            array_unique(
                array_reduce(
                    $students,
                    function ($carry, $item) {
                        return array_merge($carry, array_keys($item));
                    },
                    []
                )
            )
        );
        sort($subjects);

        return $subjects;
    }
}