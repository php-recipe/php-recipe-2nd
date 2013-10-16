<?php

# この関数は脆弱性のサンプルです。本番サーバーでは使用しないでください。
function check_url($url)
{
  if (preg_match('/\A(.+?):/s', $url, $match)) {
      $scheme = $match[1];
      if ($scheme !== 'http' && $scheme !== 'https') {
        return false;
      }
  }

  return true;
}

$url = str_repeat("\n", 100000) . 'javascript:';
var_dump(check_url($url));  // false

$url = str_repeat("\n", 1000000) . 'javascript:';
var_dump(check_url($url));  // true
