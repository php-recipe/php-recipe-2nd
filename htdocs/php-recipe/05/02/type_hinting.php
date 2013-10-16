<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>タイプヒンティングとは何ですか？</title>
</head>
<body>
<div>
<?php
# データを保持するためのMyDataクラスを定義します。
class MyData
{
  public $id;
  public $text;
}

# MyDataを受け取り、処理を行なうMyClassクラスを定義します。
class MyClass
{
  private $mydata;

# MyData型のオブジェクトを受け取るメソッドを宣言します。
  public function setData(MyData $data)
  {
# データをプロパティにセットし、セットされたデータを画面に表示します。
    $this->mydata = $data;
    echo '<p>';
    echo 'セットしたデータのID： ' . h($this->mydata->id) . '<br>';
    echo 'セットしたデータの内容： ' . h($this->mydata->text) . '<br>';
    echo '</p>';
  }
}

# 受け取ったMyData型のオブジェクトのデータを表示する関数を宣言します。
# タイプヒンティングは、関数の宣言でも使用できます。引数のデフォルト値として
# nullを指定した場合は、引数にnullが与えられてもエラーになりません。
function show_data_details(MyData $data = null)
{
# 渡されたデータがnullの場合は処理を行ないません。
  if (is_null($data)) { 
    echo '<p>渡されたデータはnullでした。</p>';
    return;
  }

# 渡されたデータの内容を表示します。
  echo '<p>渡されたデータの内容を表示します：</p>';
  echo '<ul>';
  echo '<li>id: ' . h($data->id) . '</li>';
  echo '<li>text: ' . h($data->text) . '</li>';
  echo '</ul>';
}

# MyData型のオブジェクトを生成します。
$data = new MyData();
$data->id = 1;
$data->text = '今日は雨が降っています。';

# MyClassのインスタンスを作成し、MyData型のオブジェクトをセットします。
$myclass = new MyClass();
$myclass->setData($data);

# show_data_details()関数に、MyData型のオブジェクトを渡します。
echo '<p>show_data_details()関数に$dataを渡した場合：</p>';
show_data_details($data);

# show_data_details()関数に、nullを渡します。
echo '<p>show_data_details()関数にnullを渡した場合：</p>';
show_data_details(null);

function h($string)  // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
</div>
</body>
</html>
