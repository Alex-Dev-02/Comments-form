<?php

namespace App\src\ThirdTask\Service;

use App\src\ThirdTask\Model\CommentQueryBuilder;
use App\src\ThirdTask\Model\CommentRepository;
use App\src\ThirdTask\Database\DB;

/**
 * Сервис для получения объекта репозитория
 */
class CommentService
{
    /**
     * Возвращает объект репозитория
     *
     * @return CommentRepository
     */
    public static function getRepository(): CommentRepository
    {
        $pdo = DB::getInstance()->getConnection();
        $queryBuilder = new CommentQueryBuilder();

        return new CommentRepository($pdo, $queryBuilder);
    }
}