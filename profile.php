<?php ob_start(); ?>
<html>
<head>
<?php 
$title = "Главная";
require_once "blocks/head.php";
$profile_id = getProfileID();
$profile_info = getProfileInfo($profile_id);
?>
</head>
<script src="js/profile.js"></script>
	<?php require_once "blocks/header.php" ?>
	<div id="wrapper">
		<div id="profile_info_container_div">
		<div id="big_left_side">
			<div id="profile_pic_div">
				<?php for($i = 0; $i < count($profile_info);$i++){
									echo '<img src="img/avatars/'.$profile_info[$i]["avatar"].'">';
								}
								?>
						<button id="addNewAvatar" onclick="openDarkWrappper(); uploadNewAvatar()"><h2>Обновить фото</h2></button>

				</div>
			
			</div>
			<!-- -->
			<div id="big_right_side">
			<div id="profile_info_div">
				<div id="wideLine_div">
					<table>
					<td><h2>
						<p>
							<a href="edit_profile_info.php">
							<?php 
								for($i = 0; $i < count($profile_info);$i++){
									echo $profile_info[$i]["name"];
								}
							?>
							</a>
						</p>
						
					</h2>
					</td>
				
					<td id="td2">
					
					<p style="float:right;">
					<?php 
							for($i = 0; $i < count($profile_info);$i++){
									if($profile_info[$i]["performer"]==1) echo 'Исполнитель';
										else if($profile_info[$i]["customer"]==1) echo "Заказчик";
							}
					?>
					</p>
					</td>
					</table>
					
				</div>
			<?php
				for($i = 0; $i < count($profile_info);$i++){
									$country = $profile_info[$i]["country"];
									$city = $profile_info[$i]["city"];
								}
				echo 
				"<table>
					<tr><th>Страна:</th> <td></td> <td>$country</td></tr>
					<tr><th>Город:</th> <td></td> <td>$city</td></tr>
				</table>";
			?>
			</div>
			<div id="portfolio_div">
				<div id="wideLine_div">
					<table>
						<td><h2><p><a href="store.php">Портфолио</a></p></h2></td>
						<td id="td2" style="cursor:pointer;" onclick="openDarkWrappper();addToFolio()">Добавить</td>
					</table>
				</div>
			<div id="works_list_div">
				<?php
		$fileName=array();
		$folio_info=getData('*','portfolio','author_id',$profile_id);
		for($i=0;$i<count($folio_info);$i++){
			$fileName[]=$folio_info[$i]['file_name'];
		echo '<div id="work_info_container">
					<div id="left_side">
					
									<div id="folio_pic_div"><img src="img/portfolio/'.$folio_info[$i]['file_name'].'" style="cursor:pointer;" 
									onclick="openDarkWrappper(); increasePic('.$i.')"></div>
									<script> var fileName ="'.$fileName[0].'"</script>
					</div>
					<div id="right_side">
						<div id="work_info_div">
							<table>
								<tr><th>Описание: </th></tr>
								<tr><td>'.$folio_info[$i]['description'].'</td></tr>
								<tr><th>Категория: </th></tr>
								<tr><td>'.$folio_info[$i]['category'].'</td></tr>
							</table>
						</div>
					</div>
				</div>';
			
				
				
		}for($i=0;$i<count($fileName);$i++){
		echo $fileName[$i];echo "<br>";
		}
				?>
				
			</div>
		</div>

		</div>
		</div>
	</div>
	<div id="place_for_dark_wrapper">				
	</div>
	<?php require_once "blocks/footer.php";
ob_end_flush();	?>
</body>
</html>