<?php

use App\src\ThirdTask\Service\CommentService;
use App\src\ThirdTask\Service\Session;

$commentRepository = CommentService::getRepository();
$comments = $commentRepository->getAll();

$errorMessage = Session::getMessage('error');
$successMessage = Session::getMessage('success');

Session::unsetMessage('error');
Session::unsetMessage('success');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система комментариев</title>
    <link rel="stylesheet" href="/app/public/thirdTask/assets/styles.css">
</head>
<body>
<div class="comments-container">
    <div class="comment-list">
        <?php if (empty($comments)): ?>
            <div class="no-comments">Пока нет комментариев. Будьте первым!</div>
        <?php else: ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <h3 class="comment-title"><?= $comment['title'] ?></h3>
                    <div class="comment-author"><?= $comment['author'] ?></div>
                    <div class="comment-date"> <?= $comment['created_at'] ?> </div>
                    <div class="comment-text"> <?= $comment['text'] ?> </div>
                </div>
            <?php endforeach;
        endif; ?>
    </div>

    <form class="comment-form" action="/index.php?task=thirdTask&action=request" method="post">
    <h2>Добавить комментарий</h2>

        <div class="form-group">
            <label for="author">Ваше имя:</label>
            <input type="text" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="title">Заголовок комментария:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="text">Текст комментария:</label>
            <textarea id="text" name="text" required></textarea>
        </div>

        <button type="submit">Отправить</button>

        <?php if (!empty($errorMessage)): ?>
            <div class="alert error"><?= $errorMessage ?></div>
            <?php unset($errorMessage); ?>
        <?php endif; ?>

        <?php if (!empty($successMessage)): ?>
            <div class="alert success"><?= $successMessage ?></div>
            <?php unset($successMessage); ?>
        <?php endif; ?>
    </form>
</div>
</body>
</html>
