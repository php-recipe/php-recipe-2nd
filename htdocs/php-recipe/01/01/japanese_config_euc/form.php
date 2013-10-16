<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="EUC-JP">
<title>ファイル、出力ともにEUC-JP</title>
</head>
<body>
<div>
<?php
if (isset($_POST['name'])) {
  echo '<p>名前: ' . htmlspecialchars($_POST['name'], ENT_QUOTES, 'EUC-JP') . '<br>';
  echo '(URLエンコード: ' . rawurlencode($_POST['name']) . ')</p>';
}
?>
<form method="post" action="form.php">
<input type="text" name="name">
<input type="submit" value="送信">
</form>
</div>
</body>
</html>

