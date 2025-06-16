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
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            color: #4a4a4a;
        }
        form {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .form-group{
            /* display: flex; */
            margin: auto;
        }
        .display-flex{
            display: flex;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1 class="header">檔案上傳練習</h1>

    <!----建立你的表單及設定編碼----->
    <button style="display: block;margin: 15px auto;" id="More">再加一筆</button>
    <form action="uploaded_files.php" method="post" enctype="multipart/form-data">
        <div id="uploads">
            <div class="form-group">
                <label for="name">選擇檔案上傳：</label>
                <input type="file" name="name[]" id="name" required><br>
                <select name="type[]" id="type">
                    <option value="image">影像</option>
                    <option value="document">文件</option>
                    <option value="video">影片</option>
                    <option value="music">音樂</option>
                </select>
                <textarea name="description[]" id="description"></textarea>
            </div>
        </div>
            <button type="submit">上傳檔案</button>
    </form>

    <script>
        // 批次上傳
        $("#More").on("click",function(){
            let formGroup = `<div class="form-group">
                <label for="name">選擇檔案上傳：</label>
                <input type="file" name="name[]" id="name" required><br>
                <select name="type[]" id="type">
                    <option value="image">影像</option>
                    <option value="document">文件</option>
                    <option value="video">影片</option>
                    <option value="music">音樂</option>
                </select>
                <textarea name="description[]" id="description"></textarea>
            </div>`;
            $("#uploads").append(formGroup);
            // $(".form-group").css("display","flex");
            $(".form-group").removeClass("display-flex");
            $(".form-group").addClass("display-flex");
        });
    </script>

    <!----建立一個連結來查看上傳後的圖檔---->  


</body>
</html>