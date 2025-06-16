<?php
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";

// $filename=$_FILES['myfile']['name'];
$name=$_FILES['name']['name'];
$type=$_POST['type'];
$description=$_POST['description'];

move_uploaded_file($_FILES['name']['tmp_name'], './files/'.$name);

$dsn="mysql:host=localhost;dbname=files;charset=utf8";
$pdo=new PDO($dsn, 'root', '');

$sql="insert into uploads(`name`,`type`,`description`) values ('$name','$type','$description')";

$pdo->exec($sql);

header("location:manage.php?msg=檔案上傳成功，檔名為：".$name);
?>