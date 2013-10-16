<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ファイル読み込みエラーの例</title>
</head>
<body>
<div>
<?php
# すべてのエラーを表示します。
error_reporting(E_ALL); // PHP5.4以上の場合
//error_reporting(E_ALL | E_STRICT);  // PHP5.3の場合

# 読み込むファイルのディレクトリパスを変数に代入します。
$dir = __DIR__ . '/../../../../conf';
# 読み込むファイル名を変数に代入します。
$file = 'site_conf.php';
# このままでは、エラーが発生します。
require_once $dir . $file;

echo 'BASE_URL = ' . BASE_URL . '<br>';
echo 'SSL_URL = ' . SSL_URL;
?>
</div>
</body>
</html>
