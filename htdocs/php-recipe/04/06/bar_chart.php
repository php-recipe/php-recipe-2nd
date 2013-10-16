<?php
# 別ファイルのユーザー定義関数「makeChartParts()」を読み込みます。
require_once './make_chart_parts.php';

// グラフの値
$data = array();
$data[] = array('', '2005年', '2010年');
$data[] = array('愛知県', 7254432,  7410719);
$data[] = array('岐阜県', 2107293,  2080773);
$data[] = array('三重県', 1867166,  1854724);

// グラフのオプション
$options = array(
  'title'  => '東海三県の人口（国勢調査）',  // グラフタイトル
  'titleTextStyle' => array('fontSize' => 16),  // タイトルのスタイル
  'hAxis'  => array('title' => '単位：人'),  // 横軸
  'width'  => 560,  // 幅
  'height' => 400,  // 高さ
  'colors' => array('#396', 'darkorange'),  // バーの色
  'legend' => array('position' => 'top', 'alignment' => 'end'));  // 凡例

// グラフ種類（棒グラフ）
$type = 'BarChart';

// グラフ描画のJavaScriptの関数、表示させる<div>タグの生成
list($chart, $div) = makeChartParts($data, $options, $type);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>棒グラフを生成したい</title>
<script src="https://www.google.com/jsapi"></script>
<script>
<?php
# グラフ描画関数を表示します。
echo $chart;
?>
</script>
</head>
<body>
<div>
<?php
# グラフを表示させる<div>タグを適切な場所に配置します。
echo $div;
?>
</div>
</body>
</html>
