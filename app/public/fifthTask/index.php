<?php

use App\src\FifthTask\Relative;

$n = 3;
$m = 4;

try {
    $sistersCount = Relative::getSistersCount($n, $m);

    echo 'Если у количество сестер Алисы = ' . $n . ' и количество братьев = ' . $m .
        ', то количество сестер её произвольного брата = ' . $sistersCount;
} catch (Exception $e) {
    echo '[ERROR]: ' . $e->getMessage();
}
