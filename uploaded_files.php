<?php
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";

// $filename=date("YmdHis")."_".rand(1000,9999).".".explode(".", $_FILES['myfile']['name'])[1];
// move_uploaded_file($_FILES['myfile']['tmp_name'], './files/'.$filename);

$filename=$_FILES['myfile']['name'];
// echo $filename;
move_uploaded_file($_FILES['myfile']['tmp_name'], './files/'.$filename);

?>

<img src="./files/<?=$filename;?>" alt="">