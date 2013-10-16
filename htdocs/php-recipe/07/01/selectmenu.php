<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>セレクトメニューを使いたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>結果<br>';
echo 'セレクトメニュー： ';
if (isset($_GET['example1'])) {
  echo h($_GET['example1']);
}
echo '<br>セレクトメニュー（selected属性で選択済にする）： ';
if (isset($_GET['example2'])) {
  echo h($_GET['example2']);
}
echo '<br>セレクトメニュー（size属性に2を指定）： ';
if (isset($_GET['example3'])) {
  echo h($_GET['example3']);
}
echo '<br>セレクトメニュー（multiple属性で複数選択可能にする）： ';
if (isset($_GET['example4'])) {
  foreach ($_GET['example4'] as $value) {
    echo h($value) . ' ';
  }
}
echo '<br>セレクトメニュー（disabled属性でメニューを無効化する）： ';
if (isset($_GET['example5'])) {
  echo h($_GET['example5']);
}
echo '</p><hr>';
?>
<form method="get" action="selectmenu.php">
<p>セレクトメニュー</p>
<select name="example1">
<option value="サンプル1-1">サンプル1-1</option>
<option value="サンプル1-2">サンプル1-2</option>
</select>

<p>セレクトメニュー（selected属性で選択済にする）</p>
<select name="example2">
<option value="サンプル2-1">サンプル2-1</option>
<option value="サンプル2-2" selected>サンプル2-2</option>
</select>

<p>セレクトメニュー（size属性に2を指定）</p>
<select name="example3" size="2">
<option value="サンプル3-1">サンプル3-1</option>
<option value="サンプル3-2" selected>サンプル3-2</option>
</select>

<p>セレクトメニュー（multiple属性で複数選択可能にする）</p>
<select name="example4[]" multiple>
<option value="サンプル4-1">サンプル4-1</option>
<option value="サンプル4-2">サンプル4-2</option>
</select>

<p>セレクトメニュー（disabled属性でメニューを無効化する）</p>
<select name="example5" disabled>
<option value="サンプル5-1">サンプル5-1</option>
<option value="サンプル5-2">サンプル5-2</option>
</select>

<p><input type="submit" value="送信する"></p>
</form>
</div>
</body>
</html>
