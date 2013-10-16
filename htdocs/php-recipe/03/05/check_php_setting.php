<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>PHPの設定を調べたい</title>
</head>
<body>
<div>
<?php
echo '<p>ini_get()関数で include_path の設定値を取得：</p>';
echo '<p>'. ini_get('include_path') . '</p>';

echo '<p>ini_get_all()関数の戻り値：</p>';
echo '<pre>';
print_r(ini_get_all());
echo '</pre>';
?>
</div>
</body>
</html>
