<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>関数が定義済みか調べる</title>
</head>
<body>
<div>
<?php
if (function_exists('mysqli_connect')) {
  echo 'mysqli_connect()関数が利用できます。<br>';
} else {
  echo 'mysqli_connect()関数は利用できません。<br>';
}

# test()関数を定義します。
function test() {}

var_dump(function_exists('test'));
var_dump(function_exists('xyz'));
?>
</div>
</body>
</html>
