<?php

namespace App\src\ThirdTask\Service;

/**
 * Класс для валидации полей формы
 */
class CommentValidator
{
    /**
     * Валидирует поля формы
     *
     * @param array $input
     *
     * @return string
     */
    public function validate(array $input): string
    {
        $errors = [];

        if (empty($input['title'] ?? '')) {
            $errors[] = 'Заголовок обязателен для заполнения';
        }

        if (empty($input['author'] ?? '')) {
            $errors[] = 'Имя автора обязательно для заполнения';
        }

        if (empty($input['text'] ?? '')) {
            $errors[] = 'Текст комментария обязателен для заполнения';
        }

        return implode('<br>', $errors);
    }
}