<?php
session_start();
require_once "vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$tasks = [
    'firstTask' => 'Первое задание',
    'thirdTask' => 'Третье задание',
    'fourthTask' => 'Четвёртое задание',
    'fifthTask' => 'Пятое задание'
];

$task = $_GET['task'] ?? null;
$action = $_GET['action'] ?? null;

if ($task === 'thirdTask' && $action === 'request') {
    $requestPath = __DIR__ . "/app/public/thirdTask/request.php";
    if (file_exists($requestPath)) {
        require_once $requestPath;
        exit;
    }
}

if ($task && isset($tasks[$task])) {
    $taskIndexPath = __DIR__ . "/app/public/{$task}/index.php";
    if (file_exists($taskIndexPath)) {
        echo "<h1>{$tasks[$task]}</h1>";
        include $taskIndexPath;
        exit;
    } else {
        echo "Файл задания не найден.";
        exit;
    }
}

echo "<h1>Список заданий</h1><ul>";
foreach ($tasks as $key => $title) {
    echo "<li><a href='?task={$key}'>{$title}</a></li>";
}
echo "</ul>";
