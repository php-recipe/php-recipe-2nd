<?php
# Smartyクラスを読み込みます。
require_once __DIR__ . '/../lib/smarty/Smarty.class.php';

# Smartyクラスを継承☆レシピ157☆（クラスの継承とは？）し、MySmartyクラスを作成します。
class MySmarty extends Smarty
{
   public function __construct()
   {
        parent::__construct();
        
# テンプレートのパスを指定します。定数SMARTY_DIRはSmartyクラスが配置された
# フォルダがSmartyにより定義されています。
        $this->template_dir = SMARTY_DIR . '/templates';
# コンパイルディレクトリを指定します。
        $this->compile_dir = SMARTY_DIR . '/templates_c';
# デフォルトですべての出力をHTMLエスケープします。
        $this->escape_html = true;
   }
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
