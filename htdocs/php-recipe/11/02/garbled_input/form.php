<!DOCTYPE html>
<html>
<head>
<meta charset="Shift_JIS">
<title>ファイルはUTF-8、出力はShift_JIS</title>
</head>
<body>
<div>
<?php 
if (isset($_POST['name']) && $_POST['name'] != '') {
  echo '<p>名前: ' . htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
  echo '<br>(URLエンコード: ' . rawurlencode($_POST['name']) . ')</p>';
}
?>
<form method="post" action="form.php">
<input type="text" name="name">
<input type="submit" value="送信">
</form>
</div>
</body>
</html>
