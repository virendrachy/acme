<?php
namespace Acme\myclass;

class Calculator
{
    public function add($myargs='')
    {
        $displayNegativeNumbers = true;

        $myargs_array = func_get_args();

        if (empty($myargs_array)) {
            return 0;
        }
        $sanitizedData = array();

        if (isset($myargs[0])) {

            $sanitizedData = $this->getIntArrayFromStr($myargs_array[0]);
        }

        $result = 0;

        $negativeNumber = array();

        //check input data is not grater then 1000 and negative number

        foreach ($sanitizedData as $value) {

            if ($value >= 0 && $value <= 1000) {

                $result += $value;

            } elseif ($value < 0) {

                if ($displayNegativeNumbers == true) {

                    $negativeNumber[] = $value;

                } else {

                    return "error negitive number not allowed";
                }
            }
        }
        // showing all Negative number
        if (count($negativeNumber) > 0 and $displayNegativeNumbers === true) {

            return "negitive number(".implode(',', $negativeNumber).") not allowed";
        }

        return $result;
    }
    // this function resposible for sanitize data and responsible for task 3 and 4
    public function getIntArrayFromStr($inputStr)
    {
        $diff = preg_match_all('!(-)?\d+!', $inputStr, $matches);

        $sanitizedData = array();

        foreach ($matches[0] as $value) {

            $sanitizedData[] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
        }
        return $sanitizedData;
    }
    public function multiple($myargs='')
    {
        $displayNegativeNumbers = true;

        $myargs_array = func_get_args();

        if (empty($myargs)) {
            return 0;
        }
        if (isset($myargs_array[0])) {
            $sanitizedData = $this->getIntArrayFromStr($myargs_array[0]);
        }
        $result = 1;

        $negativeNumber = array();

        //check input data is not grater then 1000 and negative number

        foreach ($sanitizedData as $value) {

            if ($value >= 0 && $value <= 1000) {

                $result *= $value;
            } elseif ($value < 0) {

                if ($displayNegativeNumbers == true) {

                    $negativeNumber[] = $value;

                } else {

                    return "error negitive number not allowed";
                }
            }
        }
        // showing all Negative number

        if (count($negativeNumber) > 0 and $displayNegativeNumbers === true) {

            return "negitive number(".implode(',', $negativeNumber).") not allowed";
        }

        return $result;
    }
}
