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
    <style>
        /* 老師用AI生成的 */
        .table {
            margin: 30px auto;
            border-collapse: collapse;
            width: 80%;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border-radius: 8px;
            overflow: hidden;
        }
        .table th, .table td {
            padding: 14px 18px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
            font-size: 16px;
        }
        .table th {
            background: #f5f6fa;
            color: #333;
            font-weight: 600;
        }
        .table tr:hover {
            background: #eaf6ff;
            transition: background 0.2s;
        }
        .table img {
            border-radius: 6px;
            border: 1px solid #ddd;
            background: #fafafa;
        }
        button {
            padding: 7px 18px;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
            margin: 0 3px;
            transition: background 0.2s, color 0.2s;
        }
        button:first-child {
            background: #27ae60;
            color: #fff;
        }
        button:first-child:hover {
            background: #219150;
        }
        button:last-child {
            background: #e74c3c;
            color: #fff;
        }
        button:last-child:hover {
            background: #c0392b;
        }
        .header {
            text-align: center;
            margin-top: 30px;
            color: #222;
            font-size: 2em;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>
<h1 class="header">檔案管理練習</h1>
<!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->
<?php
if(isset($_GET['msg'])){
    echo "<h2>".$_GET['msg']."</h2>";
}

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
        <td>
            <?php 
            if($row['type']=='image'){
                echo "<img src='./files/".$row['name']."' style='width: 100px;'>";
            } else{
                switch($row['type']){
                    case 'document':
                        echo "<img src='./icon/document.png' style='width: 50px;'>";
                        break;
                    case 'video':
                        echo "<img src='./icon/video.png' style='width: 50px;'>";
                        break;
                    case 'music':
                        echo "<img src='./icon/music.png' style='width: 50px;'>";
                        break;
                    default:
                        echo "<img src='./icon/others.png' style='width: 50px;'>";
                }
            }
            ?>
        </td>
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