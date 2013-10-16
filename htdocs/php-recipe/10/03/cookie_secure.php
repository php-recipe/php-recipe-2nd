<?php
// HTTPS通信かどうか確認
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
  // Secure属性を指定
  setcookie('name', 'test', 0, '', '', true);
}
