<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link href="print_calendar.css" rel="stylesheet">
<title>カレンダーを表示したい</title>
</head>
<body>
<div>
<?php
// Strictエラーが発生する場合
error_reporting(E_ALL & ~E_STRICT);
// StrictエラーとDeprecatedエラーが発生する場合
//error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);

require_once 'Calendar/Month/Weeks.php';

# 曜日に表示する文字列とCSSクラス名を設定します。
$weekdayDefines = array(array('日', 'sunday'),   array('月', 'monday'),
                        array('火', 'tuesday'),  array('水', 'wednesday'),
                        array('木', 'thursday'), array('金', 'friday'),
                        array('土', 'saturday'));

# カレンダーの左側に表示させる曜日を設定します。
$weekdayBase = 0;  // 0:日曜～6:土曜

# カレンダーに表示する年月を取得します。
// デフォルトの年月を設定
$year  = (int) date('Y');
$month = (int) date('n');

// GETパラメータが指定されている場合は値を検証してから表示年月を取得
if (isset($_GET['year_month'])) {
  $yyyymm = trim($_GET['year_month']);

  // YYYYMM形式であれば年月を取得
  if (preg_match('/\A([12]\d{3})(1[012]|0[1-9])\z/', $yyyymm, $match)) {
    $year  = (int) $match[1];
    $month = (int) $match[2];
  }
}

# カレンダーデータを生成します。
$calendar = new Calendar_Month_Weeks($year, $month, $weekdayBase);
$calendar->build();

# カレンダーの曜日部分を表示します。
$thisMonth = $calendar->thisMonth(true);  // 今月
$prevMonth = $calendar->prevMonth(true);  // 先月
$nextMonth = $calendar->nextMonth(true);  // 来月

$prevMonthUrl = '?year_month=' . date('Ym', $prevMonth);
$nextMonthUrl = '?year_month=' . date('Ym', $nextMonth);
$thisMonthText = date('Y/m', $thisMonth);
?>
<table class="calendar">
  <thead>
    <tr>
      <td><a href="<?php echo $prevMonthUrl; ?>">&lt;&lt;</a></td>
      <th colspan="5"><?php echo $thisMonthText; ?></th>
      <td><a href="<?php echo $nextMonthUrl; ?>">&gt;&gt;</a></td>
    </tr>
    <tr>
<?php
for ($i = 0; $i < 7; $i++) {
  $weekday = ($weekdayBase + $i) % 7;
  $weekdayText  = $weekdayDefines[$weekday][0];
  $weekdayClass = $weekdayDefines[$weekday][1];

  echo '<th class="' . $weekdayClass . '">', $weekdayText, '</th>';
}
?>
    </tr>
  </thead>
  <tbody>
<?php
# カレンダーの日付部分を表示します。
while ($days = $calendar->fetch()) {
  $days->build();
  $weekday = 0;

  echo '<tr>';
  while ($day = $days->fetch()) {
    $weekdayClass = $weekdayDefines[$weekday][1];
    if ($day->isEmpty()) {
      $dayText = "&nbsp;";
    } else {
      $dayText = $day->thisDay();
    }

    echo '<td class="' . $weekdayClass . '">', $dayText, '</td>';

    $weekday++;
  }
  echo '</tr>';
}
?>
  </tbody>
</table>
</div>
</body>
</html>
