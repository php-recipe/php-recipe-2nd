<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>インターフェイス</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';
# クラスやインターフェイスをオートロード☆レシピ159☆（オートロードって何ですか？）します。
require '../../../../lib/autoload.php';

# InterfaceSampleクラスのオブジェクトを作成します。
$test = new InterfaceSample();
# setNumericメソッドを実行し、オブジェクト内の配列にデータを保存します。
$test->setNumeric('first', 1);
$test->setNumeric('second', 2);
# 「3rd」は数値でないため、ユーザー定義のNoticeエラーが発生します。
$test->setNumeric('third', '3rd');

# クラス内の配列に保持された数値データを順に表示します。
echo '<p>';
foreach ($test->getTexts() as $text) {
  echo h($text) . '<br>';
}
echo '</p>';

# multiply()メソッドを実行し、数値を2倍にします。
$test->multiply('second');
# 「third」はセットされていないため、ユーザー定義のNoticeエラーが発生します。
$test->multiply('third');

# クラス内の配列に保持された数値データを順に表示します。
echo '<p>';
foreach ($test->getTexts() as $text) {
  echo h($text) . '<br>';
}
echo '</p>';
?>
</div>
</body>
</html>
