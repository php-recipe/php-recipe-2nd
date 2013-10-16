<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>繰り返し処理したい</title>
</head>
<body>
<div>
<p>人気言語ランキング</p>
{foreach $ranking as $key => $value}
  {$key}位 {$value} <br>
{foreachelse}
  ランキングはありません。
{/foreach}
</div>
</body>
</html>
