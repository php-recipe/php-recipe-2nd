<?php
# MySmartyクラス☆レシピ180☆（Smartyを使いたい）を読み込みます。
require_once '../../../../lib/MySmarty.php';
# MySmartyインスタンスを作成します。
$smarty = new MySmarty();

# 変数に配列を代入します。
$color = array('黄色', '緑', '紫');
$names = array('レモン', 'ほうれん草', 'ぶどう');
$price = array('100', '80', '200');
# assign()メソッドでSmarty変数に値を割り当てます。
$smarty->assign('color', $color);
$smarty->assign('name', $names);
$smarty->assign('price', $price);

# display()メソッドでテンプレートを表示します。
$smarty->display('section.tpl');
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
