-- Создание базы данных (если её нет)
CREATE DATABASE IF NOT EXISTS `alex_project` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Создание пользователя и выдача прав (если его нет)
CREATE USER IF NOT EXISTS 'alex'@'%' IDENTIFIED BY 'empty_pass';
GRANT ALL PRIVILEGES ON `alex_project`.* TO 'alex'@'%';
GRANT ALL PRIVILEGES ON `${DB_NAME}`.* TO '${DB_USER}'@'%';
FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS `comments` (
                                          `id` INT AUTO_INCREMENT PRIMARY KEY,
                                          `title` VARCHAR(255) NOT NULL,
    `text` TEXT NOT NULL,
    `author` VARCHAR(100) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_created_at` (`created_at`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comments` (`title`, `text`, `author`) VALUES
                                                       ('Первый комментарий', 'Это текст моего первого комментария на сайте', 'Иван Петров'),
                                                       ('Второй пост', 'Здесь я делюсь своими впечатлениями о проекте', 'Мария Сидорова'),
                                                       ('Важное объявление', 'Обратите внимание на новые правила форума', 'Администратор'),
                                                       ('Вопрос по PHP', 'Как правильно использовать PDO в MySQL?', 'Алексей Программистов'),
                                                       ('Совет новичкам', 'Рекомендую начинать с изучения основ SQL', 'Ольга Наставникова');