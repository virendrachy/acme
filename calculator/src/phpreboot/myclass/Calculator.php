<?php
namespace Acme\myclass;

class Calculator
{

    public $displayNegativeNumbers = true;
    public function add($myargs='')
    {
        // Set true value returns negetive number or false for negetive number not allowed
        $myargAarray = func_get_args();

        if (empty($myargAarray)) {
            return 0;
        }

        $sanitizedData = array();

        if (isset($myargs[0])) {

            $sanitizedData = $this->getIntArrayFromStr($myargAarray[0]);
        }

        $result = 0;

        $negativeNumber = array();

        //check input data is not grater then 1000 and negative number

        foreach ($sanitizedData as $value) {

            if ($value >= 0 && $value <= 1000) {

                $result += $value;

            } elseif ($value < 0) {

                if ($this->displayNegativeNumbers == true) {

                    $negativeNumber[] = $value;

                } else {

                    return "error negitive number not allowed";
                }
            }
        }
        // showing all Negative number
        if (count($negativeNumber) > 0 and $this->displayNegativeNumbers === true) {

            return "negetive number(".implode(',', $negativeNumber).") not allowed";
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
        $myargAarray = func_get_args();
        if (empty($myargs)) {
            return 0;
        }
        if (isset($myargAarray[0])) {
            $sanitizedData = $this->getIntArrayFromStr($myargAarray[0]);
        }
        $result = 1;

        $negativeNumber = array();

        //check input data is not grater then 1000 and negative number

        foreach ($sanitizedData as $value) {

            if ($value >= 0 && $value <= 1000) {
                $result *= $value;
            } elseif ($value < 0) {

                if ($this->displayNegativeNumbers == true) {
                    $negativeNumber[] = $value;
                } else {
                    return "error negitive number not allowed";
                }
            }
        }
        // showing all Negative number

        if (count($negativeNumber) > 0 and $this->displayNegativeNumbers === true) {

            return "negitive number(".implode(',', $negativeNumber).") not allowed";
        }

        return $result;
    }
}
