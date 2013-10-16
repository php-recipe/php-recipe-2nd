<?php
# 別ファイルのユーザー定義関数「makeChartParts()」を読み込みます。
require_once './make_chart_parts.php';

// グラフの値
$data = array();
$data[] = array('', '価格');  // 見出し
$data[] = array('シロノワール', 590);
$data[] = array('あんかけスパ', 750);
$data[] = array('台湾ラーメン', 630);

// グラフのオプション
$options = array(
  'title'  => 'グラフを生成したい',             // グラフタイトル
  'titleTextStyle' => array('fontSize' => 16),  // タイトルのスタイル
  'hAxis'  => array('title' => '名古屋グルメ',  // 横軸ラベル
                    'titleTextStyle' => array('color' => 'blue')),  // スタイル
  'vAxis'  => array('minValue' => 0, 'maxValue' => 800,  // 縦軸範囲
                    'title' => '単位：円'),              // 縦軸ラベル
  'width'  => 500,  // 幅
  'height' => 400,  // 高さ
  'bar'    => array('groupWidth' => '50%'),  // バーの太さ
  'legend' => array('position' => 'top', 'alignment' => 'end'));  // 凡例

// グラフ種類（縦棒グラフ）
$type = 'ColumnChart';

// グラフ描画のJavaScriptの関数、表示させる<div>タグの生成
list($chart, $div) = makeChartParts($data, $options, $type);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>グラフを生成したい</title>
<script src="https://www.google.com/jsapi"></script>
<script>
<?php
# グラフ描画のためのJavaScriptの関数を表示します。
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
