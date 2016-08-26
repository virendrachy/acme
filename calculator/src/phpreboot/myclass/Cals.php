<?php
namespace Acme\myclass;

if ($argv[1] == 'add') {
    call_user_func_array('add', $argv);
} elseif ($argv[1] == 'multiple') {
    call_user_func_array('multiple', $argv);
}

function add()
{
    $displayNegativeNumbers = true;

    $myargs = func_get_args();

    $sanitizedData = array();

    if (isset($myargs[2])) {
        $sanitizedData = getIntArrayFromStr($myargs[2]);
    }

    $result = 0;

    $negativeNumber = array();

    foreach ($sanitizedData as $value) {
        if ($value >= 0 && $value <= 1000) {
            $result += $value;
        } elseif ($value < 0) {
            if ($displayNegativeNumbers == true) {
                $negativeNumber[] = $value;
            } else {
                echo "-- error negitive number not allowed";
                exit;
            }
        }
    }

    if (count($negativeNumber) > 0 and $displayNegativeNumbers === true) {
        echo "--  negitive number(".implode(',', $negativeNumber).") not allowed";
        exit;
    }

    echo "-- " . $result;
}

function getIntArrayFromStr($inputStr)
{
    $diff = preg_match_all('!(-)?\d+!', $inputStr, $matches);
    $sanitizedData = array();
    foreach ($matches[0] as $value) {
        $sanitizedData[] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    }
    return $sanitizedData;
}

function multiple()
{
    $myargs = func_get_args();

    if (isset($myargs[2])) {
        $sanitizedData = getIntArrayFromStr($myargs[2]);
    }

    $result = 1;

    foreach ($sanitizedData as $value) {
         $result *= $value;
    }
    echo "-- " . $result;
}
