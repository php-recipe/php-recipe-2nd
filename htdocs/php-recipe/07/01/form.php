<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>日付入力のためのフォームを生成したい</title>
</head>
<body>
<form method="post" action="form.php">
<fieldset>
<p>お名前（必須）：<input type="text" name="name" autofocus required></p>
<p>性別：<input type="radio" name="sex" value="male" checked="checked">男性
<input type="radio" name="sex" value="female">女性</p>
<p>メールアドレス：<input type="email" name="mail"></p>
<p>ご利用プラン：
<select name="plan">
<option value="昼食付きプラン">昼食付きプラン</option>
<option value="昼食・夕食付きプラン">昼食・夕食付きプラン</option>
<option value="事なしプラン">食事なしプラン</option>
</select></p>
<p>ご利用日：<input type="date" name="riyoubi"></p>
<p>ご利用人数：<input type="number" name="ninzu" min="1" max="4">人</p>
<p><input type="submit" value="送信"><input type="reset" value="リセット"></p>
</fieldset>
</form>
</body>
</html>
