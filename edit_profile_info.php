<!DOCTYPE html>
<html>
<head>
<?php 
$title = "Информация о пользователе";
require_once "blocks/head.php";
$profile_id = getProfileID();
$profile_info = getProfileInfo($profile_id);
?>
</head>
<body>
	<?php require_once "blocks/header.php" ?>
	<div id="wrapper">
	<?php
								for($i = 0; $i < count($profile_info);$i++)
								{
									$country = $profile_info[$i]["country"];
									$city = $profile_info[$i]["city"];
								}
								$data = $_POST;
								if(isset($data['do_save']))
								{
									$set_field = array();
									$new_data = array();
								$set_field[0]='country';	$new_data[0]=$data['country'];
								$set_field[1]='city';		$new_data[1]=$data['city'];
								
								
								echo $profile_id;
								
								for($i=0;$i<4;$i++)
									{
										//updateData('rp_db','users',$set_field[$i],$new_data[$i],'id',$profile_id);
										updateData('rp_db','users',"`$set_field[$i]`","'$new_data[$i]'",'`id`',"'$profile_id'");
									}
									header('Location:edit_profile_info.php');
								}

								/*if(isset($data['do_save']))
								{
									for($i=0;$i<4;$i++)
									{updateData('rp_db','users',$set_field[$i],$new_data[$i],'id',$user_id)
									}
								}*/
	?>
	<div id="edit_profile_info_container_div">
	<div id="profile_info_div">
	<div id="wideLine_div"><h2><p>Информация о пользователе</p></h2></div>
				<form name="edit_info" action="edit_profile_info.php" method="POST">
				<table>
					<tr><th>Страна:</th> <td></td> <td> <select name="country">
														<option style="background-color:rgba(160,160,160,0.2);"value="<?=$country?>"><?=$country?></option>
														<option value="Россия">Россия</option>
														<option value="Украина">Украина</option>
														<option value="Беларусь">Беларусь</option>
														<option value="Казахстан">Казахстан</option>
														</select> </td></tr>
					<tr><th>Город:</th> <td></td> <td> 					<input type="text" name="city"value="<?=$city?>"> 		 </input></td></tr>
					
				</table>
				<button type="submit" name="do_save"></button>
				</form>
	</div>
	</div>
	<?php require_once "blocks/footer.php" ?>
</body>
</html>