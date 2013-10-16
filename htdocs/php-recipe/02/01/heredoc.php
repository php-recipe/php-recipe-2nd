<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ヒアドキュメント</title>
</head>
<body>
<div>
<?php
$book = 'PHP逆引きレシピ';
$text = <<<EOL
ヒアドキュメントで変数に文章を代入します。<br>
書籍名： $book<br>
EOL;

echo $text;

echo <<<END
echo で直接文章を出力することも
できます。<br><br>
END;

echo <<<'END'
Nowdoc構文です。<br>
終端IDを、シングルクォートで囲んでいることに注意してください。<br>
以下に記述した変数は展開されません。<br>
書籍名： $book<br>
END;
?>
</div>
</body>
</html>
