<!DOCTYPE html>
<html>
<head>
<?php 
$title = "Регистрация";
require_once "blocks/head.php";
?>
</head>
<body>
	<?php require_once "blocks/header.php" ?>
	<div id="wrapper">
	
	<?php
	$data = $_POST;
	if( isset($data['do_signup']))
	{
		//Здесь регистрируем
		$errors = array();
		if($data['name']=='')
		{
			$errors[] = 'Введите имя';
		}
		if(trim($data['email'])=='')
		{
			$errors[] = 'Введите почту';
		}	
			$email=$data['email'];
			$select_field="*";$table="users";$where_field="email";$value=$email;
			$result_rows=checkIfExists($select_field, $table, $where_field, $value);
			if(count($result_rows)>0)
			{
			$errors[] = 'Аккаунт с указанной почтой уже зарегистрирован';
			}
		if($data['password']=='')
		{
			$errors[] = 'Введите пароль';
		}
		if($data['repeat_password']!=$data['password'])
		{
			$errors[] = 'Пароли не совпадают';
		}
		if( empty($errors))
		{
			//Всё хорошо, регистрируем
			//$email=$data['email']; $password=$data['password']; $name=$data['name'];
			//$password=password_hash($data['password'], PASSWORD_DEFAULT);
			insertUserData($data['email'], password_hash($data['password'], PASSWORD_DEFAULT), $data['name']);
			
			$select_field="id";$table="users";$where_field="email";$value="'$email'";
			$result_value=getData ($select_field,$table,$where_field,$value);
								for($i = 0; $i < count($result_value);$i++)
								{
									$profile_id = $result_value[$i]["id"];
								}
			
			session_start();
			$_SESSION['profile_id'] = $profile_id;
			header('Location:profile.php');
		}else
			echo '<div style="color:red">'.array_shift($errors).'
		</div><hr>';
	}
	?>
	<div id="signup_form_div">
	<div id="wideLine_div"><h2>Регистрация</h2></div>
	<form name="signup" action="signup.php" method="POST">

	<p>
	<p><strong>Как Вас зовут?</strong></p>
	<input type="text" name="name" value="<?php echo @$data['name']; ?>">
	</p>
	
	<p>
	<p><strong>Введите свой Email</strong></p>
	<input type="email" name="email" value="<?php echo @$data['email']; ?>">
	</p>
	
	<p>
	<p><strong>Введите пароль</strong></p>
	<input type="password" name="password">
	</p>
	<p>
	
	<p><strong>Повторите пароль</strong></p>
	<input type="password" name="repeat_password">
	</p>
	
	<p>
	<!--<input type="submit" class="sendsubmit" name="send" value="Отправить" />-->
	<!--<img src="/img/grey_typewriter_icon.png" alt="do_signup" onclick="document.forms['signup'].submit();" /></input>-->
	<!--<input type="image" src="/img/grey_typewriter_icon.png" name="do_signup" id="do_signup" value="">-->
	<button type="submit" name="do_signup">Зарегистрироваться</button>
	</p>
	
	<p>
	<a href="login.php">Уже зарегистрированы?</a>
	</p>

	</form>
	</div>
	</div>
	
	<?php require_once "blocks/footer.php" ?>
</body>
</html>