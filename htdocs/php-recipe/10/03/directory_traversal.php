<?php
# このサンプルには脆弱性が含まれています。このファイルは絶対に本番サーバーに
# アップロードしないでください。このページを利用して攻撃が可能です。

if (isset($_GET['filename']) && preg_match('/\.txt\z/', $_GET['filename'])) {
  readfile('/home/user/files/' . $_GET['filename']);
} else {
  die('不正なファイル指定がありました。');
}
