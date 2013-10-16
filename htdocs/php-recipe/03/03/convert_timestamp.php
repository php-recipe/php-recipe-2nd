<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>文字列表現の日付をタイムスタンプに変換したい</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
// 1行分の表組みフォーマット
$outputFormat = '<tr><td>%s</td><td>%s</td><td>%s</td></tr>';

echo '<table>';
echo '<tr>';
echo '<th>引数にセットした文字列</th>';
echo '<th>タイムスタンプ</th>';
echo '<th>日付</th>';
echo '</tr>';

$time = '2013/10/1 12:34:56';
# DateTimeオブジェクトをnew演算子☆レシピ154☆（クラスを使いたい）で作成します。
$dateObj = new DateTime($time);
$timeStamp = $dateObj->getTimestamp();
$date = $dateObj->format('Y-m-d H:i:s');
echo sprintf($outputFormat, $time, $timeStamp, $date);

$time = '2014-1-1';
$dateObj = new DateTime($time);
$timeStamp = $dateObj->getTimestamp();
$date = $dateObj->format('Y-m-d H:i:s');
echo sprintf($outputFormat, $time, $timeStamp, $date);

$time = 'now';
$dateObj = new DateTime();
$dateObj->add(DateInterval::createFromDateString($time));
$timeStamp = $dateObj->getTimestamp();
$date = $dateObj->format('Y-m-d H:i:s');
echo sprintf($outputFormat, $time, $timeStamp, $date);

$time = '+1 day';
$dateObj = new DateTime();
$dateObj->add(DateInterval::createFromDateString($time));
$timeStamp = $dateObj->getTimestamp();
$date = $dateObj->format('Y-m-d H:i:s');
echo sprintf($outputFormat, $time, $timeStamp, $date);

$time = '+1 year 2 months 3weeks';
$dateObj = new DateTime();
$dateObj->add(DateInterval::createFromDateString($time));
$timeStamp = $dateObj->getTimestamp();
$date = $dateObj->format('Y-m-d H:i:s');
echo sprintf($outputFormat, $time, $timeStamp, $date);

// 日付として無効な文字列の場合、現在日時になる
$time = 'Time is Money';
$dateObj = new DateTime();
$dateObj->add(DateInterval::createFromDateString($time));
$timeStamp = $dateObj->getTimestamp();
$date = $dateObj->format('Y-m-d H:i:s');
echo sprintf($outputFormat, $time, $timeStamp, $date);

echo '</table>';
?>
</div>
</body>
</html>
