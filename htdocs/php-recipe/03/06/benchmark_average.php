<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>関数の平均実行時間を測定したい</title>
</head>
<body>
<div>
<?php
# PEAR::Benchmark_Timerをインクルードします。
require_once 'Benchmark/Iterate.php';

# 計測オブジェクトをnew演算子☆レシピ154☆（クラスを使いたい）で作成します。
$iterate = new Benchmark_Iterate();

# testArrayAdd()関数のベンチマークを実施します。
$iterate->run(10, 'testArrayAdd');
$result1 = $iterate->get();

# testArrayAdd()関数の計測結果を表示します。
echo '<p>[ ]構文で配列に値を追加した場合</p>';
echo '<ul>';
echo '<li>平均値： ' . $result1['mean'] . ' [sec]</li>';
echo '<li>全測定結果： <pre>';
print_r($result1);
echo '</pre></li>';
echo '</ul>';

# testArrayPush()関数のベンチマークを実施します。
$iterate->run(10, 'testArrayPush');
$result2 = $iterate->get();

# testArrayPush()関数の計測結果を表示します。
echo '<p>array_push()関数で配列に値を追加した場合</p>';
echo '<ul>';
echo '<li>平均値： ' . $result2['mean'] . ' [sec]</li>';
echo '<li>全測定結果： <pre>';
print_r($result2);
echo '</pre></li>';
echo '</ul>';

// 計測対象(1)（[ ]構文で配列に値を追加）
function testArrayAdd()
{
  $list = array();
  for ($i = 0; $i < 1000; $i++) {
    $list[] = $i;
  }
}

// 計測対象(2)（array_push()関数で配列に値を追加）
function testArrayPush()
{
  $list = array();
  for ($i = 0; $i < 1000; $i++) {
    array_push($list, $i);
  }
}
?>
</div>
</body>
</html>
