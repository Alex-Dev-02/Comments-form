<?php

namespace App\src\ThirdTask\Model;

/**
 * Класс-построитель запросов для работы с базой данных
 */
class CommentQueryBuilder
{
    /**
     * Название таблицы в БД
     */
    private const TABLE_NAME = 'comments';

    /**
     * Идентификатор записи в таблице комментариев
     */
    private const COMMENT_ID = 'id';

    /**
     * Поле для указания названия комментария
     */
    public const COMMENT_TITLE = 'title';

    /**
     * Поле для указания текста комментария
     */
    public const COMMENT_TEXT = 'text';

    /**
     * Поле для указания автора комментария
     */
    public const COMMENT_AUTHOR = 'author';

    /**
     * Поле для времени создания комментария
     */
    public const COMMENT_CREATED_AT = 'created_at';

    /**
     * Строит запрос к базе данных для получения всех записей
     *
     * @return string
     */
    public function getAll(): string
    {
        return 'SELECT * FROM ' . self::TABLE_NAME;
    }

    /**
     * Строит запрос к базе данных для создания новой записи
     *
     * @param array $data
     *
     * @return string
     */
    public function create(array $data): string
    {
        $columns = implode(',', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        return 'INSERT INTO ' . self::TABLE_NAME . ' (' . $columns . ') VALUES (' . $placeholders . ')';
    }

    /**
     * Строит запрос к базе данных для обновления записи
     *
     * @param int $id
     * @param array $data
     *
     * @return string
     */
    public function update(int $id, array $data): string
    {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = :$key";
        }

        return 'UPDATE '  . self::TABLE_NAME . ' SET ' . implode(', ', $set) . ' WHERE ' . self::COMMENT_ID . ' = :' . $id;
    }
}