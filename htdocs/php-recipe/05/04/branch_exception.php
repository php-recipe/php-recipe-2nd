<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>例外を分けて処理</title>
</head>
<body>
<div>
<?php
# Exceptionクラスを継承して、ユーザー定義の例外を作成します。
class NullDataException extends Exception {}
class ZeroDivisionException extends Exception {}

# 除算を行なう関数を定義します。
function division($dividend, $divisor)
{
# 引数のどちらかまたは両方がnullであればNullDataExceptionを投げます。
  if (is_null($dividend) || is_null($divisor)) {
    throw new NullDataException('nullを処理することはできません。');
  }
# 引数の「割る数」が0であればZeroDivisionExceptionを投げます。
  if ($divisor === 0) {
    throw new ZeroDivisionException('0で割ることはできません。');
  }
# 引数のどちらかまたは両方が数字でなければExceptionを投げます。
  if (! is_numeric($dividend) || ! is_numeric($divisor)) {
    throw new Exception('文字列を処理することはできません。');
  }
# 除算の結果を返します。
  return $dividend / $divisor;
}

# 除算を連続して行なうため、データを配列にセットします。
$array = array(
  array('dividend' => 10,    'divisor' => 2),
  array('dividend' => null,  'divisor' => 2),
  array('dividend' => 10,    'divisor' => 0),
  array('dividend' => 'ten', 'divisor' => 'two'),
);

foreach ($array as $dat) {
  echo '<p>';
  echo $dat['dividend'] . ' を ' . $dat['divisor'] . ' で割ろうとすると：<br>';
  try {
# 除算を行ないます。渡す引数によっては例外が発生します。
    $result = division($dat['dividend'], $dat['divisor']);
    echo '結果は ' . $result . ' です。';
  } catch (NullDataException $e) {
# NullDataExceptionが投げられた場合の例外処理を行ないます。
    echo '当然ですが、' . $e->getMessage();
  } catch (ZeroDivisionException $e) {
# ZeroDivisionExceptionが投げられた場合の例外処理を行ないます。
    echo '値が不定となるため、' . $e->getMessage();
  } catch (Exception $e) {
# その他の例外が投げられた場合の例外処理を行ないます。
    echo '残念ですが、' . $e->getMessage();
  }
  echo '</p>';
}
?>
</div>
</body>
</html>
