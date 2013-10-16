<?php
# MySmartyクラスを読み込みます。
require_once '../../../../lib/MySmarty.php';
# MySmartyインスタンスを作成します。
$smarty = new MySmarty();

# assign()メソッドでSmarty変数に値を直接割り当てます。
$smarty->assign('title', 'Hello World!');
# 連想配列に文字列を代入します。
$ad['word1'] = 'PHP逆引きレシピ';
$ad['word2'] = '発売中';
# assign()メソッドでSmarty変数に変数を割り当てます。
$smarty->assign('ad', $ad);
# assign()メソッドでSmarty変数に値を直接割り当てます。
$smarty->assign('html_data', '<del>エスケープしない</del>');

# display()メソッドでテンプレートを表示します。
$smarty->display('smarty.tpl');
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
