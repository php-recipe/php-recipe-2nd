<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>スーパーグローバル変数を取得したい</title>
</head>
<body>
<div>
<p>$_POSTの値（値を入力して「送信する」を押すと表示されます）</p>
{if isset($smarty.post.example)}
<p>{$smarty.post.example}</p>
{/if}
<p>このファイル名とパス</p>
{$smarty.server.SCRIPT_NAME}
<form method="post" action="smarty_super_global.php">
<p>入力してください</p>
<input type="text" name="example" value="">
<input type="submit" value="送信する">
</form>
</div>
</body>
</html>
