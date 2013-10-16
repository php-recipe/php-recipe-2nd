<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ファイルから指定バイト数ずつ取得したい</title>
</head>
<body>
<div>
<?php
# ファイル名を設定します（画像ファイル）。
$fileName = '../../../../data/getimagesize.jpg';

# ファイルの存在を確認します。
if (! file_exists($fileName)) {
  die('ファイルが存在しません。');
}

# ファイルを読み取りモードで開きます。
$fp = fopen($fileName, 'rb');
if (! is_resource($fp)) {
  die('ファイルを開けませんでした。');
}

# ファイルをロックします（共有ロック）。
flock($fp, LOCK_SH);

# ファイルのデータを番号を付けて表示します。
$num = 1;
$length = 20;
echo "ファイルの先頭から{$length}バイトずつ取得して10行表示します。<br><pre>";
while (! feof($fp) && ($string = fread($fp, $length)) !== false) {
  echo $num++ . ' : ';
  echo ftell($fp) . ' : ';  // ファイルポインタの現在位置
# バイナリのデータを16進数表記に変換し表示します。
  echo bin2hex($string) . "\n";
  
  if ($num > 10) {
    break;
  }
}

# ファイルのロックを解除します。
flock($fp, LOCK_UN);

# ファイルを閉じます。
fclose($fp);
echo '</pre>';
?>
</div>
</body>
</html>
