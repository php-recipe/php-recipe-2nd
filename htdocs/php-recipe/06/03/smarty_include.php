<?php
# MySmartyクラス☆レシピ180☆（Smartyを使いたい）を読み込みます。
require_once '../../../../lib/MySmarty.php';
# MySmartyインスタンスを作成します。
$smarty = new MySmarty();

# assign()メソッドでSmarty変数に値を割り当てます。
$smarty->assign('title', 'テンプレートを分割したい');
$smarty->assign('body', 'Hello World!');
# display()メソッドでテンプレートを表示します。
$smarty->display('include_index.tpl');
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
