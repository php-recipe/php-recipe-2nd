<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列の内容をデバッグ表示したい</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
$data = array(array('string' => '一郎', 'bool'  => true),
              array('string' => '',     'float' => 3.1415),
              array('int'    => 10,     'null'  => null));

echo '<table><tr>';
echo '<td class="vtop">print_r()関数で表示<pre>';
print_r($data);
echo '</pre></td>';

echo '<td class="vtop">var_dump()関数で表示<pre>';
var_dump($data);
echo '</pre></td>';

echo '<td class="vtop">var_export()関数で表示<pre>';
var_export($data);
echo '</pre></td>';
echo '</tr></table>';
?>
</div>
</body>
</html>
