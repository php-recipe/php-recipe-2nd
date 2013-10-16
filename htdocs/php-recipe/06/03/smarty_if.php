<?php
# MySmartyクラス☆レシピ180☆（Smartyを使いたい）を読み込みます。
require_once '../../../../lib/MySmarty.php';
# MySmartyインスタンスを作成します。
$smarty = new MySmarty();

# 変数に配列を代入します。
$ranking = array('1' => 'PHP',  '2' => 'Perl', '3' => 'Java',
                 '4' => 'Ruby', '5' => 'Python');
# assign()メソッドでSmarty変数に値を割り当てます。
$smarty->assign('name', 'Perl');
$smarty->assign('ranking', $ranking);

# display()メソッドでテンプレートを表示します。
$smarty->display('if.tpl');
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
