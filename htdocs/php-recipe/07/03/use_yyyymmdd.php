<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>「YYYY/MM/DD」形式の日付を利用したい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

$originalDate1 = '2016/02/28';
# 日付文字列からDateTimeオブジェクトを生成します。
$date1 = new DateTime($originalDate1);
# UNIXタイムスタンプを整数で取得します。
$timeStamp1 = $date1->getTimestamp();
echo '<p>元の日付: ' . h($originalDate1) . '<br>';
echo 'UNIXタイムスタンプ: ' . h($timeStamp1) . '<br>';
echo 'フォーマット変換処理: ' . h($date1->format('Y年n月j日')) . '<br>';
# 1日加算します。
$date1->add(DateInterval::createFromDateString('+1 day'));
echo '1日加算後: ' . h($date1->format('Y/m/d'));
echo '</p>';

$originalDate2 = '2016-2-30';
# 日付文字列からDateTimeオブジェクトを生成します。
$date2 = new DateTime($originalDate2);
# UNIXタイムスタンプを取得します。
$timeStamp2 = $date2->getTimestamp();
echo '<p>元の日付: ' . h($originalDate2) . '<br>';
echo 'UNIXタイムスタンプ: ' . h($timeStamp2) . '<br>';
echo 'フォーマット変換処理: ' . h($date2->format('Y年n月j日')) . '<br>';
# 1日加算します。
$date2->add(DateInterval::createFromDateString('+1 day'));
echo '1日加算後: ' . h($date2->format('Y/m/d'));
echo '</p>';

$originalDate3 = '2116/2/28';
# 日付文字列からDateTimeオブジェクトを生成します。
$date3 = new DateTime($originalDate3);
# UNIXタイムスタンプを取得します。
$timeStamp3 = $date3->getTimestamp();
echo '<p>元の日付: ' . h($originalDate3) . '<br>';
echo 'UNIXタイムスタンプ: ' . h($timeStamp3) . '<br>';
echo 'フォーマット変換処理: ' . h($date3->format('Y年n月j日')) . '<br>';
# 1日加算します。
$date3->add(DateInterval::createFromDateString('+1 day'));
echo '1日加算後: ' . h($date3->format('Y/m/d'));
echo '</p>';
?>
</div>
</body>
</html>
