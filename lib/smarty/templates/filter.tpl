<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>フィルタを使いたい</title>
</head>
<body>
<div>
<p>strip_tags: {$string1|strip_tags}</p>
<p>date_format: {$string2|date_format:"%Y年 %m月 %d日"}</p>
<p>nl2br: {$string3|escape|nl2br nofilter}</p>
<p>PHPのnumber_format()関数: {$string4|number_format}</p>
</div>
</body>
</html>
