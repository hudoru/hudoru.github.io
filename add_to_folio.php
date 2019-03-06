<meta charset="utf-8">
<?php
require_once "blocks/head.php";
if(isset($_POST['do_save'])){
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$category = $_POST['category'];
	$description = htmlspecialchars($_POST['description']);
	

	
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg','jpeg','png');
	$profile_id=getProfileID();
    $count=getData ('count(id)','portfolio', 'author_id',"$profile_id");
	$number=$count[0]["count(id)"];
	$number++;
	if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 1000000){
				
				$fileNameNew = "profile_".$profile_id."_folio_".$number.".".$fileActualExt;
				$fileDestination = 'img/portfolio/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				if(isset($description))insertData('portfolio', '`author_id`,`category`,`description`,`file_name`', "$profile_id,'$category', '$description', '$fileNameNew'");
				else insertData('portfolio', '`author_id`, `category`,`file_name`', "$profile_id,'$category','$fileNameNew'");
				
                header("Location: index.php");
			}else {
				echo "Файл, который Вы пытаетесь загрузить, имеет слишком большой размер.";
			}
		}else {
			echo "При загрузке файла возникла ошибка.";
		}
	}else {
		echo "Вы не можете загружать файлы данного типа.";
	}
	

}
?>