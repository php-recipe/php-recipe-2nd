<!DOCTYPE html>
<html>
<head>
<meta charset="Shift_JIS">
<title>Shift_JIS�ł̏o��</title>
</head>
<body>
<div>
<?php 
if (isset($_POST['name']) && $_POST['name'] != '') {
  echo '<p>���O: ' . htmlspecialchars($_POST['name'], ENT_QUOTES, 'SJIS');
  echo '<br>(URL�G���R�[�h: ' . rawurlencode($_POST['name']) . ')</p>';
}
?>
<form method="post" action="form.php">
<input type="text" name="name">
<input type="submit" value="���M">
</form>
</div>
</body>
</html>
