<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>JSON形式のデータを返すWeb APIを作りたい</title>
<link href="../../css/style.css" rel="stylesheet">
<script src="../../js/jquery-2.0.3.min.js"></script>
<!-- Internet Explorer 6～8で動作させる場合はバージョン1系を使用してください -->
<!-- <script src="../../js/jquery-1.10.2.min.js"></script> -->
<script>
  $(function(){
// jQueryを使用して、読込ボタンがクリックされたら処理を行ないます。
    $("#load").on("click", function(){
// Web API（json.php）で生成したjsonデータを取得して処理します。
      $.getJSON("json.php", function(data){
        for (var i in data) {
// 行のオブジェクトを生成します。
          var tr = $("<tr>");
// 列のオブジェクトを生成して行に追加します。
          var td_item = $("<td>").text(data[i].item);
          tr.append(td_item);
          var td_price = $("<td>").text(data[i].price);
          tr.append(td_price);
          var td_orders = $("<td>").text(data[i].orders);
          tr.append(td_orders);
// 行のオブジェクトをテーブルに追加します。
          $("#listbox").append(tr);
// 読込ボタンを非表示化します。
          $("#load").hide();
        }
      });
    });
  });
</script>
</head>
<body>
<div>
<input type="button" value="読込" id="load">
<table id="listbox">
<tr>
<th>品名</th>
<th>価格</th>
<th>注文数</th>
</tr>
</table>
</div>
</body>
</html>
