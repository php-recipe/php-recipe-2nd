<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>日付が正しいかどうかチェックしたい</title>
</head>
<body>
<div>
<?php
# フォームからデータを受け取ります。このファイルを初めて表示した時は日付データは
# 送信されていないので、今日の日付を年・月・日別の変数に代入します。
$year  = isset($_POST['year'])  ? intval($_POST['year'])  : date('Y');
$month = isset($_POST['month']) ? intval($_POST['month']) : date('n');
$day   = isset($_POST['day'])   ? intval($_POST['day'])   : date('j');

$yearSelector = '';  // 年部分のセレクトメニューオプション
for ($i = 1980; $i <= 2040; $i++) {
  $selected = ($i == $year) ? 'selected' : '';
  $yearSelector .= '<option ' . $selected . '>' . $i . '</option>';
}
$monthSelector = '';  // 月部分のセレクトメニューオプション
for ($i = 1; $i <= 12; $i++) {
  $selected = ($i == $month) ? 'selected' : '';
  $monthSelector .= '<option ' . $selected . '>' . $i . '</option>';
}
$daySelector = '';  // 日部分のセレクトメニューオプション
for ($i = 1; $i <= 31; $i++) {
  $selected = ($i == $day) ? 'selected' : '';
  $daySelector .= '<option ' . $selected . '>' . $i . '</option>';
}

# チェックしたい日付の送信フォームを出力します。
echo <<<END
  <form method="post" action="checkdate.php">
    <select name="year">$yearSelector</select>年&nbsp;
    <select name="month">$monthSelector</select>月&nbsp;
    <select name="day">$daySelector</select>日&nbsp;
    <input type="submit" value="日付をチェック">
  </form>
END;

$date = $year . '/' . $month . '/' . $day;  // チェックする日付

# 日付が正しいかどうかをチェックします。
if (checkdate($month, $day, $year)) {
  echo '<p>' . $date, ' は正しい日付です。</p>';
} else {
  echo '<p>' . $date, ' は正しくない日付です。</p>';
}
?>
</div>
</body>
</html>
