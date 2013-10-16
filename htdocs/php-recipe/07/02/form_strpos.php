<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>特定の文字列を含むかチェックしたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

// 検索対象その1
$string1 = 'example@www.example.jp';

echo '<ul><li>検索対象文字列1: ' . h($string1);
if (isset($_POST['keyword1']) && $_POST['keyword1'] != '') {
  $keyword1 = $_POST['keyword1'];
  if (strpos($string1, $keyword1) !== false) {
    echo '<p>' . h($string1) . 'に「' . h($keyword1) . '」は含まれています</p>';
  } else {
    echo '<p>' . h($string1) . 'に「' . h($keyword1) . '」は含まれていません</p>';
  }
}
echo '</li>';

// 検索対象その2
$string2 = 'PHP逆引きレシピ';

echo '<li>検索対象文字列2: ' . h($string2);
if (isset($_POST['keyword2']) && $_POST['keyword2'] != '') {
  $keyword2 = $_POST['keyword2'];
  if (mb_strpos($string2, $keyword2) !== false) {
    echo '<p>' . h($string2) . 'に「' . h($keyword2) . '」は含まれています</p>';
  } else {
    echo '<p>' . h($string2) . 'に「' . h($keyword2) . '」は含まれていません</p>';
  }
}
echo '</li></ul>';
?>
<form method="post" action="form_strpos.php">
<p>1: 検索キーワードを入力(半角英数字のみ)
<input type="search" name="keyword1" value=""></p>
<p>2: 検索キーワードを入力
<input type="search" name="keyword2" value=""></p>
<p><input type="submit" value="検索"></p>
</form>
</div>
</body>
</html>
