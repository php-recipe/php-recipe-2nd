<?php
# テスト対象のクラス定義を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once __DIR__ . '/../lib/Language.php';

# データベーステスト用のクラスを継承☆レシピ157☆（クラスの継承とは？）します。
class LanguageTest extends PHPUnit_Extensions_Database_TestCase
{
  protected $db;

# データベースの接続処理☆レシピ260☆（データベースに接続したい）を記述します。
  protected function getConnection()
  {
    if (! $this->db) {
      $this->db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    }

    return $this->createDefaultDBConnection($this->db);
  }

# テストに使用するデータセットを読み込む処理を記述します。
  protected function getDataSet()
  {
    $dataset = new PHPUnit_Extensions_Database_DataSet_YamlDataSet(
      __DIR__ . '/../data/phpunit_dataset/LanguageTest_fixture.yml'
    );

    return $dataset;
  }

# insert()メソッドをテストするメソッドを定義します。
  public function testInsertLanguage()
  {
# Languageインスタンスを生成し、insert()メソッドを実行します。
    $language = new Language($this->db);
    $language->insert('Lisp');

# 行数が6行になっていることを確認します。
    $test = $this->getConnection()->getRowCount('example');
    $this->assertEquals(6, $test);

# データ挿入後のデータセットを読み込みます。
    $after_dataset = new PHPUnit_Extensions_Database_DataSet_YamlDataSet(
      __DIR__ . '/../data/phpunit_dataset/LanguageTest_after_insert.yml'
    );
# ファイルから読み込んだデータセットから、データテーブルを取得します。
    $expected = $after_dataset->getTable('example');
# データベースから、データ挿入後の実際のデータテーブルを作成します。
    $test = $this->getConnection()->createQueryTable(
      'example', 'SELECT * FROM example'
    );

# 2つのデータテーブルを比較します。
    $this->assertTablesEqual($expected, $test);
  }
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
