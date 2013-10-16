<?php
# 無名関数を使用してオートロード関数を登録します。
spl_autoload_register(
  function ($classname) {
# __DIR__はこのソースファイルがあるディレクトリが定義されるマジック定数です。
# 引数として渡されたクラス名を元に「クラス名.class.php」を探します。
    $filepath = __DIR__ . '/' . $classname . '.class.php';

# ファイルの存在確認☆レシピ120☆（ファイルが読み取り可能か調べたい）を行ないます。
    if (is_readable($filepath)) {
# 引数として渡されたクラス名を元に、対応するファイルを読み込みます。
      require $filepath;
    }
  }
);

# 別のオートロード関数を登録します。
spl_autoload_register(
  function ($classname) {
# 引数として渡されたクラス名を元に「クラス名.php」を探します。
    $filepath = __DIR__ . '/' . $classname . '.php';

    if (is_readable($filepath)) {
      require $filepath;
    }
  }
);
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
