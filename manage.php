<?php
/**
 * 1.建立資料庫及資料表來儲存檔案資訊
 * 2.建立上傳表單頁面
 * 3.取得檔案資訊並寫入資料表
 * 4.製作檔案管理功能頁面
 */


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案管理功能</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">檔案管理練習</h1>
<!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->
<?php


$dns="mysql:host=localhost;dbname=files;charset=utf8";
$pdo=new PDO($dns, 'root', '');
$rows=$pdo->query("select *from uploads")->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- table.table>(tr>th*5)+(tr>td*5) -->
<table class="table">
    <tr>
        <th>序號</th>
        <th>縮圖</th>
        <th>檔名</th>
        <th>類型</th>
        <th>操作</th>
    </tr>
    <?php foreach($rows as $key => $row): ?>
    <tr>
        <td><?=$row['id']?></td>
        <td><img src="./files/<?=$row['name']?>" style="width: 100px;"></td>
        <td><?=$row['name']?></td>
        <td><?=$row['type']?></td>
        <td>
            <button>編輯</button><button>刪除</button>
        </td>
    </tr>
    <?php endforeach; ?>
</table>




<!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->




</body>
</html>