<?php
# 別ファイルのユーザー定義関数「makeChartParts()」を読み込みます。
require_once './make_chart_parts.php';

// グラフの値
$data = array(
  array('', '平均気温', '平均湿度'),
  array('1月',   4.5, 64), array('2月',   5.2, 61), array('3月',   8.7, 59),
  array('4月',  14.4, 60), array('5月',  18.9, 65), array('6月',  22.7, 71),
  array('7月',  26.4, 74), array('8月',  27.8, 70), array('9月',  24.1, 71),
  array('10月', 18.1, 68), array('11月', 12.2, 66), array('12月',  7.0, 65));

// グラフのオプション
$options = array(
  'title'  => '名古屋市の平均気温と平均湿度（1981～2010年）',  // グラフタイトル
  'titleTextStyle' => array('fontSize' => 16), // タイトルのスタイル
  'series' => array(1 => array('targetAxisIndex' => 1)),  // 縦軸を2軸化
  'vAxes'  => array(0 => array('title'    => '平均気温（℃）',  // 縦軸左側
                               'minValue' =>  0, 'minValue' => 40),
                    1 => array('title'    => '平均湿度（％）',  // 縦軸右側
                               'minValue' => 40, 'maxValue' => 80)),
  'width'  => 550, 'height' => 340,  // 幅、高さ
  'chartArea' => array('width' => 460, 'height' => 240),  // グラフエリア
  'legend' => array('position' => 'in', 'alignment' => 'start'));  // 凡例

// グラフ種類（折れ線グラフ）
$type = 'LineChart';

// グラフ描画のJavaScriptの関数、表示させる<div>タグの生成
list($chart, $chart_div) = makeChartParts($data, $options, $type);

// 2つ目のグラフは1つ目のグラフのデータを表組にする
$options = array('width' => 240);  // グラフ（表組）のオプション
$type = 'Table';  // グラフ種類（表組）
list($table, $table_div) = makeChartParts($data, $options, $type);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>折れ線グラフを生成したい</title>
<script src="https://www.google.com/jsapi"></script>
<script>
<?php
# グラフ描画関数を表示します。
echo $chart, $table;
?>
</script>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
# グラフを表示させる<div>タグを適切な場所に配置します。
echo $chart_div, $table_div;
?>
</div>
</body>
</html>
