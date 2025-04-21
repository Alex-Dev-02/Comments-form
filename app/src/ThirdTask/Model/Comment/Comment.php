<?php

namespace App\src\ThirdTask\Model\Comment;

use App\src\ThirdTask;
use DateTimeImmutable;
use DateTimeInterface;

/**
 * Модель комментария
 */
class Comment
{
    /**
     * @param int|null $id
     * @param string $title
     * @param string $text
     * @param string $author
     * @param DateTimeImmutable|null $created_at
     */
    public function __construct(
        private ?int   $id,
        private string $title,
        private string $text,
        private string $author,
        private ?DateTimeImmutable $created_at = null
    ) {
        $this->created_at = $created_at ?? new DateTimeImmutable();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->created_at;
    }
}