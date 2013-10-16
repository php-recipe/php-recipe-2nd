<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ベンチマークを取得したい(1)</title>
</head>
<body>
<div>
<?php
# PEAR::Benchmark_Timerをインクルードします。
require_once 'Benchmark/Timer.php';

# タイマーオブジェクトをnew演算子☆レシピ154☆（クラスを使いたい）で作成します。
$timer = new Benchmark_Timer();

# 計測を開始します。
$timer->start();

// 計測対象(1)（sha1()関数を1000回実行）
for ($i = 0; $i < 1000; $i++) {
  sha1($i);
}

# マーカーをセットします。
$timer->setMarker('sha1()関数を1000回実行');

// 計測対象(2)（md5()関数を1000回実行）
for ($i = 0; $i < 1000; $i++) {
  md5($i);
}
$timer->setMarker('md5()関数を1000回実行');

# 計測を終了し、結果を表示します。
$timer->stop();
$timer->display();
?>
</div>
</body>
</html>
