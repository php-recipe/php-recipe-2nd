<?php
mb_http_output('SJIS');
ob_start('mb_output_handler');

# 文字エンコードを変換する関数です。
function convertEncoding($array)
{
# 引数が配列の場合は、配列の各々の要素を自分自身に渡し処理します。
# array_map()関数の第1引数は、コールバック関数です。自分自身を指定
# しています。
  if (is_array($array)) {
    return array_map('convertEncoding', $array);
  }
# 引数が配列でない場合は、文字エンコードをUTF-8に変換し、返します。
  else {
    return mb_convert_encoding($array, 'UTF-8', 'SJIS');
  }
}

# $_POSTの文字エンコードをUTF-8に変換します。
if (count($_POST)) {
  $_POST = convertEncoding($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="Shift_JIS">
<title>Shift_JISでの出力</title>
</head>
<body>
<div>
<?php 
if (isset($_POST['name']) && $_POST['name'] != '') {
  echo '<p>名前: ' . htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
  echo '<br>(URLエンコード ' . rawurlencode($_POST['name']) . ')</p>';
}
?>
<form method="post" action="form_output_sjis_internal_utf8.php">
<input type="text" name="name">
<input type="submit" value="送信">
</form>
</div>
</body>
</html>
