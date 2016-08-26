<?php
namespace Acme\myclass;

if ($argv[1] == 'add') {
    call_user_func_array('add', $argv);
} elseif ($argv[1] == 'multiple') {
    call_user_func_array('multiple', $argv);
}
