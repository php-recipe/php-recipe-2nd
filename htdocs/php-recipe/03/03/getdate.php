<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>日付や時刻を取得したい</title>
</head>
<body>
<div>
<p>現在の日時から要素別に表示<br>
<?php
# 現在の日時から要素を取得します。
$today = getdate();

# 現在の日時を要素別に表示します。
echo '年:' . $today['year'] . '<br>';
echo '月:' . $today['mon'] . '<br>';
echo '日:' . $today['mday'] . '<br>';
echo '曜日:' . $today['wday'] . ' (日曜:0～土曜:6)<br>';
echo '時:' . $today['hours'] . '<br>';
echo '分:' . $today['minutes'] . '<br>';
echo '秒:' . $today['seconds'] . '<br>';
echo '1月1日からの日数:' . $today['yday'];
echo '</p>';

echo '<p>過去のタイムスタンプから要素別に表示<br>';
$past = strtotime('2009-06-29 12:34:56');
echo '過去のタイムスタンプ:' . $past . '<br>';
# 過去のタイムスタンプから要素を取得します。
$past = getdate($past);

echo '年:' . $past['year'] . '<br>';
echo '月:' . $past['mon'] . '<br>';
echo '日:' . $past['mday'] . '<br>';
echo '曜日:' . $past['wday'] . ' (日曜:0～土曜:6)<br>';
echo '時:' . $past['hours'] . '<br>';
echo '分:' . $past['minutes'] . '<br>';
echo '秒:' . $past['seconds'] . '<br>';
echo '1月1日からの日数:' . $past['yday'];
?>
</p>
</div>
</body>
</html>
