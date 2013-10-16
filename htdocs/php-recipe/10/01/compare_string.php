<?php
var_dump('abc' == 0);         // true
var_dump('1e2' == 100);       // true
var_dump('3.14abc' == 3.14);  // true

var_dump('5.0' == '5');   // true
var_dump('7e0' == '7');   // true
var_dump('0xA' == '10');  // true

var_dump('9.1abc' == '9.1');  // false
var_dump('9' == 9.1);         // false

var_dump(
  '11111111111111111111' == '11111111111111111112'
);  // PHP5.4.3以前ではtrue
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
