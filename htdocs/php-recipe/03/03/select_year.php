<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>日付セレクトメニューを表示したい</title>
</head>
<body>
<div>
<?php
$from = (int) date('Y');  // 現在の年
$to = $from + 5;

echo '<select name="year">';
for ($i = $from; $i <= $to; $i++) {
  echo "<option value=\"$i\">$i</option>";
}
echo '</select> 年 ';
?>
</div>
</body>
</html>
