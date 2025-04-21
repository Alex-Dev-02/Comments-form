<?php

use App\src\FirstTask\Config\Config;
use App\src\FirstTask\Service\DisplayService;

$displayService = new DisplayService(Config::getSampleData());
$displayedData = $displayService->displayData();
$students = $displayedData['students'];
$subjects = $displayedData['subjects'];
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table, td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th></th>
            <?php foreach ($subjects as $subject): ?>
                <th><?= $subject ?></th>
            <?php endforeach; ?>
        </tr>

        <?php foreach ($students as $name => $studentSubjects): ?>
            <tr>
                <td><?= htmlspecialchars($name) ?></td>

                <?php foreach ($subjects as $subject): ?>
                    <td>
                        <?php if (isset($studentSubjects[$subject])): ?>
                            <?= $studentSubjects[$subject]?>
                        <?php endif; ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

