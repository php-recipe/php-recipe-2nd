<?php

if (setlocale(LC_ALL, 'pl_PL') === false) {
  error_log('Locale not found: pl_PL');
  exit('Locale not found: pl_PL');
}

require_once __DIR__ . '/../../../../conf/database_conf.php';

$db = new PDO($dsn, $dbUser, $dbPass);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo $conn->quote(123.45) . PHP_EOL;  // '123,45'
