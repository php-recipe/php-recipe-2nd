<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ArrayObjectオブジェクト、Countableインターフェイス</title>
</head>
<body>
<div>
<?php
# ArrayObjectクラスを継承しMyArrayObjectクラスを定義します。
class MyArrayObject extends ArrayObject
{
# Countableインターフェイスのcount()メソッドをオーバーライドします。
  public function count()
  {
    echo 'count処理が呼び出されました： ';
# ArrayObjectクラスにあるcount()メソッドを呼び出して値を返します。
    return parent::count();
  }
}

# ArrayObjectクラスのインスタンスを生成します。
$arrayobj = new MyArrayObject(array('first', 'second'));
# 配列への処理と同じようにデータを追加できます。
$arrayobj[] = 'third';
$arrayobj[] = array('4th', '5th');

echo '<pre>';
print_r($arrayobj);
echo '</pre>';

# キー名を指定してのデータ追加や、unset()によるデータの削除も可能です。
$arrayobj['key'] = '6th';
unset($arrayobj[3]);

# foreach構文を使用して内部のデータを取り出すことができます。
echo '<ul>';
foreach ($arrayobj as $key => $value) {
  echo '<li>' . $key . '： ' . $value . '</li>';
}
echo '</ul>';

# データの取得も配列と変わりません。
echo '<p>';
echo '$arrayobj[1]： ' . $arrayobj[1];
echo '<br>';
echo '$arrayobj[\'key\']： ' . $arrayobj['key'];
echo '</p>';

# 内部関数であるcount()関数を使うことでCountableインターフェイスの
# count()メソッドを呼び出せることに注目してください。
echo count($arrayobj);
?>
</div>
</body>
</html>
