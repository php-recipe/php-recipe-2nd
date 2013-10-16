<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>FileInfoクラスを利用する</title>
</head>
<body>
<div>
<?php
# FileInfoクラスの定義されたFileInfo.phpを読み込みます。
require_once '../../../../lib/FileInfo.php';

$fileInfo = new FileInfo();
$fileInfo->readFile('./use_class.php');
echo '改行コードは「'. h($fileInfo->getRetCode()). '」です。';

function h($string)  // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
</div>
</body>
</html>
