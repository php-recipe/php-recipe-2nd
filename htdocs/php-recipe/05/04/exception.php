<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>例外処理</title>
</head>
<body>
<div>
<?php
# 除算を行なう関数を定義します。
function division($dividend, $divisor)
{
# 引数の「割る数」が0であればExceptionクラスのインスタンスを投げます。
  if ($divisor === 0) {
    throw new Exception('0で割ることはできません。');
  }
  return $dividend / $divisor;
}

# 例外が発生する可能性のある箇所をtry句で囲みます。
try {
  echo division(10, 5) . '<br>';  // 例外は発生せず、正常に処理が終了
  echo division(10, 0) . '<br>';  // 処理中に例外が発生し、処理がcatch句へ移る
  echo division(10, 2) . '<br>';  // 直前の行で例外が発生するため実行されない
} catch (Exception $e) {
# Exceptionクラスの例外が投げられた場合、処理がここに移ります。
# 投げられた例外のインスタンスが$eに代入されているので、そのgetMessage()
# メソッドを呼び出し、エラーメッセージを表示します。
  echo '例外発生： ' . $e->getMessage() . '<br>';
}

# catch句の処理が終了すると、その後の処理が実行されます。
echo 'try-catchによる処理が終了しました。' . '<br>';

# try句の外で例外が発生すると、Fatalエラーとなります。
echo division(10, 0) . '<br>';
# 以下の処理は実行されません。
echo division(10, 3) . '<br>';
?>
</div>
</body>
</html>
