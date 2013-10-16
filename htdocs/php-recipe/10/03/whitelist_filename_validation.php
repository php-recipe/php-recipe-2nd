<?php
# ホワイトリストを定義します。
$fileList = array(1 => 'foo.txt', 2 => 'bar.txt', 3 => 'baz.txt');

if (! isset($_GET['file']) || ! isset($fileList[$_GET['file']])) {
    die('不正なファイル指定がありました。');
} else {
# 検査済みであることがわかりやすいように別の変数に代入します。
    $fileNo = $_GET['file'];
}

readfile('/home/user/files/' . $fileList[$fileNo]);
