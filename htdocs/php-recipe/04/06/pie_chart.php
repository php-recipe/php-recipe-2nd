<?php
# 別ファイルのユーザー定義関数「makeChartParts()」を読み込みます。
require_once './make_chart_parts.php';

// グラフ1の値
$data = array();
$data[] = array('', '2005年');
$data[] = array('15歳未満', 14.8);
$data[] = array('15～64歳', 67.9);
$data[] = array('65歳以上', 17.3);

// グラフ1のオプション
$options = array(
  'title'  => '2005年',  // グラフタイトル
  'titleTextStyle' => array('fontSize' => 16),  // タイトルのスタイル
  'width'  => 360,  // 幅
  'height' => 300,  // 高さ
  'legend' => array('position' => 'bottom', 'alignment' => 'center'));  // 凡例

// グラフ種類（円グラフ）
$type = 'PieChart';

// 「グラフ1」グラフ描画のJavaScriptの関数、表示させる<div>タグの生成
list($chart1, $div1) = makeChartParts($data, $options, $type);

// グラフ2の値
$data = array();
$data[] = array('', '2010年');
$data[] = array('15歳未満', 14.5);
$data[] = array('15～64歳', 65.2);
$data[] = array('65歳以上', 20.3);

// グラフ2のオプション（グラフ1のオプションのタイトルのみを変更）
$options['title'] = '2010年';

// 「グラフ2」グラフ描画のJavaScriptの関数、表示させる<div>タグの生成
list($chart2, $div2) = makeChartParts($data, $options, $type);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>円グラフを生成したい</title>
<script src="https://www.google.com/jsapi"></script>
<script>
<?php
# グラフ描画関数を表示します。
echo $chart1, $chart2;
?>
</script>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<p>愛知県年齢3区分人口比率（国勢調査）</p>
<?php
# グラフを表示させる<div>タグを適切な場所に配置します。
echo $div1, $div2;
?>
</div>
</body>
</html>
