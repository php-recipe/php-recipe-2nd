<?php
# このサンプルには脆弱性が含まれています。このファイルは絶対に本番サーバーに
# アップロードしないでください。このページを利用して攻撃が可能です。

$cmd = '/usr/bin/wget';

$URL = 'http://' . $_GET['url'];
$safer_URL = strtr($URL, '"', ' ');
exec($cmd . ' "' . $safer_URL . '"', $results, $return);

echo $cmd . ' "' . $safer_URL . '"';  // 実行されたコマンドの表示
