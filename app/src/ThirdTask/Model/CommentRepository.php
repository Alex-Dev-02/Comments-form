<?php

namespace App\src\ThirdTask\Model;

use App\src\ThirdTask\Model\Comment\Comment;
use App\src\ThirdTask\Model\CommentQueryBuilder as QueryBuilder;
use PDO;

/**
 * Репозиторий для работы с моделью комментария
 */
class CommentRepository
{
    /**
     * @param PDO $connection
     * @param CommentQueryBuilder $queryBuilder
     */
    public function __construct(
        private readonly PDO $connection,
        private readonly QueryBuilder $queryBuilder
    ) { }

    /**
     * Получает все записи из базы
     *
     * @return array|false
     */
    public function getAll(): array|false
    {
        $stmt = $this->connection->query(
            $this->queryBuilder->getAll()
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Добавляет или обновляет комментарий в базе
     *
     * @param Comment $comment
     *
     * @return void
     */
    public function save(Comment $comment): void
    {
        $data = [
            QueryBuilder::COMMENT_TITLE => $comment->getTitle(),
            QueryBuilder::COMMENT_TEXT => $comment->getText(),
            QueryBuilder::COMMENT_AUTHOR => $comment->getAuthor(),
            QueryBuilder::COMMENT_CREATED_AT => $comment->getCreatedAt()->format('Y-m-d H:i:s')
        ];

      if (is_null($comment->getId())) {
          $sql = $this->queryBuilder->create($data);
          $stmt = $this->connection->prepare($sql);
          $stmt->execute($data);
          $comment->setId($this->connection->lastInsertId());
      } else {
          $sql = $this->queryBuilder->update($comment->getId(), $data);
          $stmt = $this->connection->prepare($sql);
          $stmt->execute(array_merge($data, ['id' => $comment->getId()]));
      }
    }
}