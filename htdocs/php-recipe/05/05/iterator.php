<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>イテレータ</title>
</head>
<body>
<div>
<?php
# 一般的なクラスSimpleClassを定義します。
class SimpleClass
{
  public $property0 = 'zero';
  public $property1 = '1st';
  public $property2 = '2nd';
# 下の行はprivateなプロパティのため、クラス外からのforeach構文の取得対象になりません。
  private $property3 = '3rd';
# 下の行はpublicなプロパティのため、クラス外からのforeach構文の取得対象になります。
  public $doNotShowThisProperty = 'dummy!';
}

# SimpleClassをインスタンス化して、foreach構文でデータを表示します。
# publicとなっているすべてのプロパティを取得できることがわかります。
$simple = new SimpleClass();
echo '<p>SimpleClassのインスタンスに対してforeach構文を使用する：<br>';
foreach ($simple as $key => $value) {
  echo $key . ': ' . $value . '<br>';
}
echo '</p>';

# Iteratorインターフェイスを実装したIteratableClassを定義します。
class IteratableClass implements Iterator
{
  public $property0 = 'zero';
  public $property1 = '1st';
  public $property2 = '2nd';
# 下の行のプロパティは一般的なクラスSimpleClassではクラス外からのforeach構文の
# 取得対象になりませんでしたが、実装したIteratorの処理により取得対象になります。
  private $property3 = '3rd';
# 下の行のプロパティは一般的なクラスSimpleClassではクラス外からのforeach構文の
# 取得対象になっていましたが、実装したIteratorの処理により取得対象になりません。
  public $doNotShowThisProperty = 'dummy!';

# 現在のカーソル位置を保持します。
  private $position;

# 以下、いずれのメソッドもforeach構文により自動的に呼ばれます。
# 現在のカーソル位置のデータを返します。
  public function current()
  {
    $valuename = 'property' . $this->position;
# ☆レシピ155☆（「$this」や「->」とは何ですか？）で紹介したとおり、プロパティ名の前に$を付けることで
# $valuenameの値のプロパティ名のデータを取得します。
    return $this->$valuename;
  }
# 現在のカーソル位置のキーを返します。
  public function key()
  {
    return 'property' . $this->position;
  }
# カーソル位置を次に進めます。
  public function next()
  {
    $this->position++;
  }
# foreach構文の処理の開始時に呼ばれ、カーソル位置を最初に巻き戻します。
  public function rewind()
  {
    $this->position = 0;
  }
# next()メソッドおよびrewind()メソッドの呼び出し後に呼ばれ、カーソル位置にデータが存在するか確認します。
# データが存在しなければそこでforeach構文による反復処理を停止します。
  public function valid()
  {
    $valuename = 'property' . $this->position;
    return isset($this->$valuename);
  }
}

$iteratable = new IteratableClass();
echo '<p>IteratableClassのインスタンスに対してforeach構文を使用する：<br>';
foreach ($iteratable as $key => $value) {
  echo $key . ': ' . $value . '<br>';
}
echo '</p>';
?>
</div>
</body>
</html>
