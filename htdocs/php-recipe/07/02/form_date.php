<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>日付入力のためのフォームを生成したい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';
# 三項演算子☆レシピ025☆（「条件式 ? 式1 : 式2」って何ですか？）とisset()☆レシピ015☆（変数がセットされているかどうか調べたい）で未入力時のデフォルト値をセットします。

$year  = isset($_POST['year'])  ? $_POST['year']  : 0;
$month = isset($_POST['month']) ? $_POST['month'] : 0;
$day   = isset($_POST['day'])   ? $_POST['day']   : 0;

# 年月日が「0」でないことで、フォームがPOSTされたかどうか判定します。
if ($year !== 0 && $month !== 0 && $day !== 0) {
  if (checkdate($month, $day, $year)) {
    echo '<p>' . h($year) . '年' . h($month) . '月' . h($day) .
         '日は正しい日付です。</p>';
  } else {
    echo '<p>' . h($year) . '年' . h($month) . '月' . h($day) .
         '日は正しい日付ではありません。</p>';
  }
}
?>
<form method="post" action="form_date.php">
<?php
echo '<select name="year">' . "\n";
$start = date('Y') - 20;
$end   = date('Y') + 20;
for ($i = $start; $i <= $end; $i++) {
  echo '<option value="' . h($i) . '"';
  echo ($year == $i) ? ' selected' : '';
  echo '>' . h($i) . '</option>' . "\n";
}
echo '</select>年' . "\n";
echo '<select name="month">' . "\n";
for ($i = 1; $i <= 12; $i++) {
  echo '<option value="' . h($i) . '"';
  echo ($month == $i) ? ' selected' : '';
  echo '>' . h($i) . '</option>' . "\n";
}
echo '</select>月' . "\n";
echo '<select name="day">' . "\n";
for ($i = 1; $i <= 31; $i++) {
  echo '<option value="' . h($i) . '"';
  echo ($day == $i) ? ' selected' : '';
  echo '>' . h($i) . '</option>' . "\n";
}
echo '</select>日' . "\n";
?>
<input type="submit" value="送信する">
</form>
</div>
</body>
</html>
