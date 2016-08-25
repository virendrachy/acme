<?php
namespace Acme\myclass;

class Calculator
{
     public function add($numbers = '')
    {
        if (empty($numbers)) {
            return 0;
        }

        $numbersArray = explode(",", $numbers);

        return array_sum($numbersArray);
    }
}
