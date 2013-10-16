<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>名前空間の記述を短くする</title>
</head>
<body>
<div>
<?php
# 名前空間を含むソースファイルを読み込みます。
# 内容については☆レシピ167☆（名前空間とは何ですか？）を参照してください。
require_once '../../../../lib/MyNamespace/NSClass.php';
require_once '../../../../lib/MyNamespace/SubNamespace/NSClass.php';

# グローバル空間にShortenNSClassクラスを定義します。
class ShortenNSClass
{
  public static function show()
  {
    return 'グローバル空間の ShortenNSClass の show() メソッド';
  }
}

# use演算子を使用してエイリアス／インポートを行ないます。
# 名前空間に別名を付けます。
use MyNamespace\SubNamespace as SubNS;
# クラスに別名を付けます。
use MyNamespace\NSClass as NSClassInMyNS;
# 以下は use MyNamespace\SubNamespace\NSClass as NSClass; と同じです。
use MyNamespace\SubNamespace\NSClass;
# グローバル空間に存在するクラスにも別名を付けることが可能です。
use ShortenNSClass as GlobalNSClass;

# メソッドを呼び出します。
echo '<p>';
echo h(SubNS\NSClass::show()) . '<br>';
echo h(NSClassInMyNS::show()) . '<br>';
echo h(NSClass::show()) . '<br>';
echo h(GlobalNSClass::show()) . '<br>';
echo '</p>';

function h($string)  // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
</div>
</body>
</html>
