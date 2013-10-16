<?php
# このサンプルには脆弱性が含まれています。このファイルは絶対に本番サーバーに
# アップロードしないでください。このページを利用して攻撃が可能です。

include $_GET['theme'];
include '/home/user/data/article' . $_GET['article'] . 'dat';
