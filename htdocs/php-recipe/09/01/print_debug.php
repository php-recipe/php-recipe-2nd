<?php
# テストしたい関数。配列の中の全要素を<br>タグで連結し、結果を返します。
function br_all($array)
{
  $result = implode('<br>', $array);
  return $result;
}

# 関数を実際に呼び出し、結果を表示します。
$test_array = array('Apple', 'Orange', 'Grape');
echo br_all($test_array);
