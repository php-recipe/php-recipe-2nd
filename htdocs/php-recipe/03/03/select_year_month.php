<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>日付セレクトメニューを表示したい</title>
</head>
<body>
<div>
<?php
$from = mktime(0, 0, 0, 6, 1, 2009);
$to = mktime(0, 0, 0, 10, 1, 2013);

echo '<select name="year_month">';
$current = $from;
while ($current <= $to) {
  $label = date('Y年 m月', $current);
  $value = date('Ym', $current);
  echo "<option value=\"$value\">$label</option>";

  $date = getdate($current);
  $current = mktime(0, 0, 0, $date['mon'] + 1, 1, $date['year']);
}
echo '</select> ';
?>
</div>
</body>
</html>
