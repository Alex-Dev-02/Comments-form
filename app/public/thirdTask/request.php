<?php

use App\src\ThirdTask\Service\CommentService;
use App\src\ThirdTask\Model\Comment\Comment;
use App\src\ThirdTask\Service\CommentValidator;
use App\src\ThirdTask\Service\Session;
use App\src\ThirdTask\Service\Redirect;
use App\src\ThirdTask\Service\FormData;
use App\src\ThirdTask\Config\MessageStatusInterface;

$commentRepository = CommentService::getRepository();
$validator = new CommentValidator();

if (!empty($_POST)) {
    Session::unsetMessage(MessageStatusInterface::ERROR);
    Session::unsetMessage(MessageStatusInterface::SUCCESS);

    $formData = FormData::get();
    $errorMessage = $validator->validate($formData);

    if (!empty($errorMessage)) {
        Session::setMessage('error', $errorMessage);
        Redirect::to('/index.php?task=thirdTask');
    }

    try {
        $comment = new Comment(
            null,
            $formData['title'],
            $formData['text'],
            $formData['author']
        );
        $commentRepository->save($comment);
        Session::setMessage(MessageStatusInterface::SUCCESS, 'Комментарий успешно добавлен');
    } catch (Exception $e) {
        Session::setMessage(MessageStatusInterface::ERROR, 'Ошибка при сохранении комментария: ' . $e->getMessage());
    }

   Redirect::to('/index.php?task=thirdTask');
}