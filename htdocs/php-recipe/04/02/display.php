<?php
# GETクエリで画像ファイル名を受けます。
if (! isset($_GET['file'])) {
  die('表示するファイルが指定されていません。');
}
$fileName = basename($_GET['file']);

$dirName = '../../../../data';
$subDirList = array('output' => 1);  // 表示を許可するディレクトリ名のリスト

# GETクエリにディレクトリ名が指定されている場合はチェックして追加します。
if (isset($_GET['dir'])) {
  if (! isset($subDirList[$_GET['dir']])) {
    die('不正な指定がありました。');
  }
  $path = $dirName . '/' . $_GET['dir'] . '/' . $fileName;
} else {
  $path = $dirName . '/' . $fileName;
}

# 画像を出力します。
if (file_exists($path) && ($imageSize = getimagesize($path)) !== false) {
  // HTTPヘッダーが送信されていなければ、
  // 画像単独表示と判定してHTTPヘッダーを送信
  if (! headers_sent()) {
    header('Content-Type: ' . $imageSize['mime']);
# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
    header('X-Content-Type-Options: nosniff');
  }
  readfile($path);
} else {
  echo '画像の出力ができません。';
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
