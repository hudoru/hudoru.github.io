<?php ob_start(); ?>
<html>
<head>
<?php 

$title = "Авторизация";
require_once "blocks/head.php";
?>
</head>
<body>
	<?php require_once "blocks/header.php" ?>
	<div id="wrapper">
	
<?php
	$data = $_POST;
	if( isset($data['do_login']))
	{
		//
		$errors = array();
		if(trim($data['email'])=='')
		{
			$errors[] = 'Введите почту';
		}	
			$email=$data['email'];
			$select_field="*";$table="users";$where_field="email";$value=$email;
			$result_rows=checkIfExists($select_field, $table, $where_field, $value);
			if(count($result_rows)>0)// Если почта найдена
			{
				if($data['password']=='')
					{
						$errors[] = 'Введите пароль';
					}else if($data['password']!='')
						{	
								$select_field="id,password";$table="users";$where_field="email";$value="'$email'";
								$result_value=getData ($select_field,$table,$where_field,$value);
								for($i = 0; $i < count($result_value);$i++)
								{
									$correct_password = $result_value[$i]["password"];
								}
									// Если введённый парорль совпадает с паролем, полученным из БД
									if(password_verify($data['password'],$correct_password))
									{
										for($i = 0; $i < count($result_value);$i++)
										{
											$profile_id = $result_value[$i]["id"];
										}
									}else $errors[]='Вы ввели неправильный пароль';
						}
			}
			else $errors[]='Аккаунт с указанной почтой не найден';
		
		if( empty($errors))
		{	session_start();
			$_SESSION['profile_id'] = $profile_id;
			header('Location:profile.php');
			
			/*echo '
			<script language="JavaScript"> window.location.href = "profile.php" </script>
			';*/
			/*echo '<div style="color:green">'.$profile_id.'
		</div><hr>';*/
		}else
			echo '<div style="color:red">'.array_shift($errors).'
		</div><hr>';
	}
	?>
	<div id="signup_form_div">
	<div id="wideLine_div"><h2>Авторизация</h2></div>
	<form name="login" action="login.php" method="POST">	
	
	<p>
	<p><strong>Введите свой Email</strong></p>
	<input type="email" name="email" value="<?php echo @$data['email']; ?>">
	</p>
	
	<p>
	<p><strong>Введите пароль</strong></p>
	<input type="password" name="password" value="<?php echo @$data['password']; ?>">
	</p>
	<p>
	
	<p>
	<button type="submit" name="do_login">Войти</button>
	</p>

	</form>
	</div>
	</div>
	
	<?php require_once "blocks/footer.php";
ob_end_flush();	?>
</body>
</html>