<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="EUC-JP">
<title>�ե����롢���ϤȤ��EUC-JP</title>
</head>
<body>
<div>
<?php
if (isset($_POST['name'])) {
  echo '<p>̾��: ' . htmlspecialchars($_POST['name'], ENT_QUOTES, 'EUC-JP') . '<br>';
  echo '(URL���󥳡���: ' . rawurlencode($_POST['name']) . ')</p>';
}
?>
<form method="post" action="form.php">
<input type="text" name="name">
<input type="submit" value="����">
</form>
</div>
</body>
</html>

