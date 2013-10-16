<?php
# ログファイルを設定します。
$logPath = __DIR__ . '/../../../../data/output';
if (! is_dir($logPath)) {
  die('ディレクトリが存在しません。');
}

$dateObj = new DateTime();
$date = $dateObj->format('Ymd');
$fileName = realpath($logPath) . '/' . $date . '.log';

# 書き込む文字列を用意します。
$accessTime = $dateObj->format('Y-m-d H:i:s');
$accessFile = $_SERVER['SCRIPT_FILENAME'];
$log = "$accessTime $accessFile にアクセス\n";

# ファイルを追記モードで開きます。
$fp = fopen($fileName, 'ab');
if (! is_resource($fp)) {
  die('ファイルを開けませんでした。');
}

# ファイルをロックします（排他的ロック）。
flock($fp, LOCK_EX);

# ログを書き込みます。
fwrite($fp, $log);

# ファイルのロックを解除します。
fflush($fp);
flock($fp, LOCK_UN);

# ファイルを閉じます。
fclose($fp);

# ブラウザには何も表示されません。
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
