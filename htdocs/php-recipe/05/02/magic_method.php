<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>マジックメソッド</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# __toString()メソッドを持ったAnimalクラスを定義します。
class Animal
{
  public function __toString()
  {
# 「__CLASS__」はマジック定数の1つで、現在のクラス名が定義されます。
    return 'これは' . __CLASS__ . 'クラスです。';
  }
}

# Anamalクラスをインスタンス化します。
$animal = new Animal();

# オブジェクト$animalを文字列型にキャストして表示します。
$str = (string) $animal;
echo '<p>h($str)： ' . h($str) . '</p>';

# オブジェクト$animalを直接h()関数に渡して自動キャストさせ、表示します。
echo '<p>h($animal)： ' . h($animal) . '</p>';
?>
</div>
</body>
</html>
