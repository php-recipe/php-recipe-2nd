<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>条件分岐したい</title>
</head>
<body>
<div>
{if isset($name) && $name == 'PHP'}
  <p>「PHP逆引きレシピ」はおすすめ書籍です。</p>
{elseif $name == 'Perl'}
  <p>PHPはおすすめ言語です。</p>
{/if}
<p>人気言語ランキング</p>
{if is_array($ranking) && (count($ranking) > 0)}
{foreach $ranking as $key => $value}
  {$key}位 {$value}<br>
{foreachelse}
  ランキングはありません。
{/foreach}
{/if}
</div>
</body>
</html>
