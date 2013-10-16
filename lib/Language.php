<?php
# テスト対象のクラスを定義します。
class Language
{
  protected $db;

# PDOによるデータベース接続をインスタンス生成時に受け取り、プロパティに保存します。
  public function __construct($db)
  {
    $this->db = $db;
  }

# テスト対象のメソッドを定義します。
  public function insert($language)
  {
# レコードを追加☆レシピ265☆（新規レコードを作成したい）します。
    $sql = 'INSERT INTO example (language) VALUES (:language)';
    $prepare = $this->db->prepare($sql);
    $prepare->bindValue(':language', $language, PDO::PARAM_STR);
    $prepare->execute();
  }
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
