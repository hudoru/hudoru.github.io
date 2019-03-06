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
	
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg','jpeg','png');

	if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 1000000){
				$profile_id=getProfileID();
				$fileNameNew = $profile_id.".".$fileActualExt;
				$fileDestination = 'img/avatars/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				updateData('rp_db','users','avatar',$profile_id.".".$fileActualExt,'id',$profile_id);
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