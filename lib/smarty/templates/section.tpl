<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>繰り返し処理したい</title>
</head>
<body>
<div>
<p>色/名前/価格</p>
{section name=list loop=$color}
  色: {$color[list]}<br>
  名称: {$name[list]}<br>
  価格: &yen;{$price[list]}<br>
{sectionelse}
  データは空です。
{/section}
</div>
</body>
</html>
