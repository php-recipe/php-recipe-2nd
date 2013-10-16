<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>spl_autoload_register()関数によるオートロード</title>
</head>
<body>
<div>
<?php
# オートロードの設定を読み込みます。
require '../../../../lib/autoload.php';

echo 'FileInfoクラスをインスタンス化します：';
$obj = new FileInfo();
$obj->readFile(__FILE__);
echo '<br>getRetCode()メソッドを呼び出します：';
echo $obj->getRetCode();
echo '<br>';
echo 'Counter::current()を呼び出します：';
echo Counter::current();
?>
</div>
</body>
</html>
