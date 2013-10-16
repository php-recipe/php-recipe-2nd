<?php
# MySmartyクラス☆レシピ180☆（Smartyを使いたい）を読み込みます。
require_once '../../../../lib/MySmarty.php';
# MySmartyインスタンスを作成します。
$smarty = new MySmarty();

# display()メソッドでテンプレートを表示します。
$smarty->display('global.tpl');
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
