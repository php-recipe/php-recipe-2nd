<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>日付を和暦表記にしたい</title>
</head>
<body>
<div>
<?php
$year = 2013;
$month = 10;
$day = 1;
echo '<p>西暦： ' . $year . '/' . $month . '/' . $day . '</p>';
$ret = toJapaneseDate($year, $month, $day);
if ($ret !== false) {
  echo '<p>和暦： ' . $ret . '</p>';
} else {
  echo '<p>不正な年月日です</p>';
}

# toJapaneseDate()関数
# 西暦を和暦表記の文字列に変換します。ただしこの関数は1873年（明治6年）より前
# の日付を変換できません。引数には西暦の年、月、日を指定します。
function toJapaneseDate($year, $month, $day)
{
# 不正な年月日、1872年以前が指定された場合はfalseを返します。
  if (! checkdate($month, $day, $year) || $year < 1873) {
    return false;
  }
  
# 西暦をYYYYMMDD形式の数値に変換します。
  $date = (int) sprintf('%04d%02d%02d', $year, $month, $day);
  
# 日付数値から元号と和暦年を求めます。
  if ($date >= 19890108) {  // 1989年1月8日から平成
    $label = '平成';
    $localYear = $year - 1988;
  } elseif ($date >= 19261225) {  // 1926年12月25日から昭和
    $label = '昭和';
    $localYear = $year - 1925;
  } elseif ($date >= 19120730) {  // 1912年7月30日から大正
    $label = '大正';
    $localYear = $year - 1911;
  } else {  // それ以前は明治
    $label = '明治';
    $localYear = $year - 1868;
  }
  
# 元号○年○月○日のように書式を整えます。元号の1年目の場合は元年とします。
  if ($localYear == 1) {
    $wareki = $label . '元年';
  } else {
    $wareki = $label . $localYear . '年';
  }
  return $wareki . $month . '月' . $day . '日';
}
?>
</div>
</body>
</html>
