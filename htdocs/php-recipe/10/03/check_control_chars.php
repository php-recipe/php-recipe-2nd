<?php

function checkControl($array)
{
  if (is_array($array)) {
    return array_map('checkControl', $array);
  }
  if (preg_match('/\A[\r\n\t[:^cntrl:]]{0,400}\z/u', $array) == 0) {
    error_log(
      'Invalid control characters: ' . rawurlencode($array) . ' ' .
      $_SERVER['SCRIPT_NAME'] . ' ' .
      $_SERVER['REMOTE_ADDR'] . ' "' . $_SERVER['HTTP_USER_AGENT'] . '"'
    );
    die('不正な入力です。');
  }
}

checkControl($_GET);
checkControl($_POST);
checkControl($_COOKIE);
