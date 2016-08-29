<?php

require_once 'vendor/autoload.php';

use  Acme\myclass\Calculator;

$calculator = new Calculator();

if (!isset($argv[1])) {
    echo 'Operation missing' . PHP_EOL;
    exit(0);
}

try {
    switch ($argv[1]) {
        case 'add':
            echo $calculator->add($argv[2]) . PHP_EOL;
            break;
        case 'multiple':
            echo $calculator->multiple($argv[2]) . PHP_EOL;
            break;
        default:
            echo 'Please check the operator.' . PHP_EOL;
    }
} catch (\InvalidArgumentException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
