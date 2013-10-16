<?php
// データベース設定
$dbServer = '127.0.0.1';
$dbUser   = 'user';
$dbPass   = 'password';
$dbName   = 'sample';

# MySQL用のDSN文字列です。
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
# SQLite用のDSN文字列です。
//$dsn = "sqlite:../../../../data/sqlite/sample.db";
