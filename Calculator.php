<?php

require_once 'vendor/autoload.php';

use Acme\myclass\Calculator;

$calculator = new Calculator();

if (!isset($argv[1])) {
    echo 'Operation missing.' . PHP_EOL;
    exit(0);
}

switch ($argv[1]) {
    case 'add':
        $numbers = isset($argv[2]) ? $argv[2] : '';
        echo $calculator->add($numbers) . PHP_EOL;
        break;
    default:
        echo 'Please check the operator.' . PHP_EOL;
}
?>
