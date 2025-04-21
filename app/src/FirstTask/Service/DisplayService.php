<?php

namespace App\src\FirstTask\Service;

use App\src\FirstTask\Manager\SubjectManager;

/**
 * Сервис для получения обработанного массива студентов и массива предметов
 */
class DisplayService
{
    /**
     * @param array $data
     */
    public function __construct(private readonly array $data) { }

    /**
     * Возвращает информацию по студентам и полный список предметов
     *
     * @return array
     */
    public function displayData(): array
    {
        $students = StudentMap::map($this->data);
        $subjects = SubjectManager::getSubjectsList($students);

        return [
            'students' => $students,
            'subjects' => $subjects
        ];
    }
}