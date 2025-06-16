<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編輯資料</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* form{
            width: 450px;
            height: 200px;
            margin: auto;
            text-align: left;
            border: 1px solid rgb(151, 151, 151);
        } */
    </style>
</head>
<body>
    <h1 class="header">編輯資料</h1>
    <!----建立你的表單及設定編碼----->
    <?php
        include_once "db.php";
        $row=find("uploads", $_GET['id']);
    ?>

    <form action="save_upload.php" method="post" enctype="multipart/form-data">
        <?php
            switch($row['type']){
                case 'image':
                    echo "<img src='./files/{$row['name']}'  alt='檔案預覽' style='max-width: 200px; max-height: 200px;'>";
                    break;
                case 'document':
                    echo "<img src='./icon/document.png' alt='文件預覽' style='max-width: 64px; max-height: 64px;'>";
                    break;
                case 'video':
                    echo "<img src='./icon/video.png' alt='影片預覽' style='max-width: 64px; max-height: 64px;'>";
                    break;
                case 'music':
                    echo "<img src='./icon/music.png' alt='音樂預覽' style='max-width: 64px; max-height: 64px;'>";
                    break;
                default:
                    echo "<img src='./icon/others.png' alt='未知檔案類型' style='max-width: 64px; max-height: 64px;'>";
            }
        ?>
        <label for="name">選擇檔案上傳：</label>
        <input type="file" name="name" id="name" required><br>
        <br>
        <select name="type" id="type">
            <option value="image" <?=($row['type']=='image')?'selected':'';?>>影像</option>
            <option value="document" <?=($row['type']=='document')?'selected':'';?>>文件</option>
            <option value="video" <?=($row['type']=='video')?'selected':'';?>>影片</option>
            <option value="music" <?=($row['type']=='music')?'selected':'';?>>音樂</option>
        </select>
        <br>
        <textarea name="description" id="description"><?=$row['description'];?></textarea>
        <br>
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <button type="submit">上傳檔案</button>
    </form>

    <!----建立一個連結來查看上傳後的圖檔---->  


</body>
</html>