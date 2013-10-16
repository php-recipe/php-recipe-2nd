<?php
# MySmartyクラス☆レシピ180☆（Smartyを使いたい）を読み込みます。
require_once '../../../../lib/MySmarty.php';
# MySmartyインスタンスを作成します。
$smarty = new MySmarty();

# assign()メソッドでSmarty変数に値を割り当てます。
$smarty->assign('string1', '<b>PHP逆引き</b>');
$smarty->assign('string2', '2013/04/01');
$smarty->assign('string3', "改行を\n含む");
$smarty->assign('string4', 1000);

# display()メソッドでテンプレートを表示します。
$smarty->display('filter.tpl');
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
