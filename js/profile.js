function openDarkWrappper() {
			document.getElementById('place_for_dark_wrapper').style.height = '100%';
			
	var element = document.getElementById('place_for_dark_wrapper');
		var dark_wrapper = document.createElement('div');
	dark_wrapper.id='dark_wrapper';
	//element.innerHTML = '<div id="dark_wrapper" onclick="closeDarkWrappper()"></div>'
	
	element.appendChild(dark_wrapper);
	element = document.getElementById('dark_wrapper');
	

	/*var button = document.createElement('button');
	button.name = 'close';
	button.onclick = 'openDarkWrappper()';
	element.appendChild(button);*/

}
function uploadNewAvatar() {
	var element = document.getElementById('dark_wrapper');
	element.innerHTML = '<button name="close" onclick="closeDarkWrappper()"></button>'
	+'<div id="uploading_avatar_container">'
+'<header style="background-color:#fafafa; border-color:rgba(192, 192, 192,0.5);">Загрузка новой фотографии</header>'
+'<div id = "uploading_avatar_div">'
+'<form action="upload.php" method="POST" enctype='+"'multipart/form-data'>"
+'<center><p>Допустимые форматы: jpg, jpeg, png.</p><br>'
+'<p>Пожалуйста, убедитесь, что размер загружаемого Вами файла не превышает 1МБ. </p><br>'
+'<input type="file" name="file"></center><br>'
+'<center><button type="submit" name="do_save" style="float:none;"></center>'
+'</form>'
+'</div>'
+'</div>'

}
function addToFolio(){
	var element = document.getElementById('dark_wrapper');
	element.innerHTML = '<button name="close" onclick="closeDarkWrappper()"></button>'
	+'<div id="uploading_avatar_container" style="height:370px;">'
+'<header style="background-color:#fafafa; border-color:rgba(192, 192, 192,0.5);">Добавление работы в портфолио</header>'
+'<div id = "uploading_avatar_div">'
+'<form action="add_to_folio.php" method="POST" enctype='+"'multipart/form-data'>"
+'<center><p>Допустимые форматы: jpg, jpeg, png.</p><br></center>'
+'<table style="margin-left: 40px;">'
					+'<tr><th>Категоория:</th></tr><tr> <td> <select name="category">'
														
														+'<option value="Иллюстрация">Иллюстрация</option>'
														+'<option value="Лого">Лого</option>'
														+'<option value="Web-баннер">Web-баннер</option>'
														+'<option value="Упаковка">Упаковка</option>'
														+'<option value="Упаковка">Другое</option>'
														+'</select> </td></tr>'
					+'<tr><th>Описание:</th> <td></td> </tr><tr><td><textarea name="description" style="height:100px;width:410px;resize:none;float:right;"></textarea></td></tr>'
					
				+'</table>'
+'<input type="file" name="file" style="margin-left:40px;"><br>'
+'<center><button type="submit" name="do_save" style="float:none;"></center>'
+'</form>'
+'</div>'
+'</div>'
}
function increasePic(i){
	var element = document.getElementById('dark_wrapper');
	element.innerHTML = '<button name="close" onclick="closeDarkWrappper()"></button>'
	+'<img style="height:100%; width:auto;" src="img/portfolio/'+fileName+'">'
	+fileName
	+' | '+i;

	
}
function closeDarkWrappper() {
	var element = document.getElementById('dark_wrapper');
	var parent = element.parentNode;
	parent.removeChild(element);
}
