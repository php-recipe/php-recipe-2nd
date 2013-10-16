<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>unserialize()</title>
</head>
<body>
<div>
<?php
# MyClassクラスを定義したファイルを読み込みます。オブジェクトをアンシリアライズ
# する際にはそのクラスが定義されている必要があります。
require_once '../../../../lib/MyClass.php';

# ファイル保存されている、シリアライズされたオブジェクトの文字列を取得します。
# ファイルが存在しなかった場合はWarningエラーが表示されます。
$serialized = file_get_contents('../../../../data/output/serialized_object');

if ($serialized === false) {
  // ファイルが読み取れなかった場合
  echo '<p>オブジェクトがファイルとして保存されていませんでした。</p>';
} else {
  // ファイルが読み取れた場合
  echo '<p>シリアライズされたオブジェクトを復元します。</p>';
# オブジェクトを復元します。
  $obj = unserialize($serialized);
# オブジェクト内のメソッドを使用し、データを表示します。
  echo '<p>保存されていたデータ： ' . h($obj->getValue()) . '</p>';

# 後始末としてファイルを削除します。
  unlink('../../../../data/output/serialized_object');
}

function h($string)  // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
<a href="./serialize.php">オブジェクトをserialize()してファイルに保存する</a>
</div>
</body>
</html>
