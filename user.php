<!DOCTYPE html>
<html>
<head>
<?php 
$title = "Главная";
require_once "blocks/head.php";
$profile_id=getProfileID();
/*session_start();
		$user_id = $_SESSION['user_id'];
		session_destroy($_SESSION['user_id']);*/
$user_id = $_POST['user_id'];
$profile_info = getProfileInfo($user_id);
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
	<?php require_once "blocks/header.php" ?>
	<div id="wrapper">
		<div id="profile_info_container_div">
		<div id="big_left_side">
			<div id="profile_pic_div">
				
				
				<?php for($i = 0; $i < count($profile_info);$i++){
									echo '<img src="/img/avatars/'.$profile_info[$i]["avatar"].'">';

								}?>
						
						
						<script>
						var user_one = "<?php echo $profile_id ?>";
						var user_two = "<?php echo $user_id ?>";
						$(document).ready(function() {
						$("#add_friend").bind("click", function() {
								var add_friend = "1";
								$.ajax({
									url: "make_friends.php",
									type: "POST",
									data: ({add_friend:add_friend, user_one:user_one, user_two:user_two}),
									dataType: "html"
									});
								
							});
							$("#cancel_friendship").bind("click", function() {
								var add_friend ="";
								$.ajax({
									url: "make_friends.php",
									type: "POST",
									data: ({add_friend:add_friend, user_one:user_one, user_two:user_two}),
									dataType: "html"
								});
							});
							});
							
						</script>
								
						<div id="place_for_button">
						<?php
						$are_we_friends=getData ('*','friends','user_one',"'$profile_id' 
						AND user_two='$user_id' AND friendship_official='0'");
						
						if(count($are_we_friends)==0)
						{
									$are_we_friends=getData ('*','friends','user_one',"'$profile_id' 
									AND user_two='$user_id' AND friendship_official='1'");
										if(count($are_we_friends)>0)
											{	
												echo '<button id="" onclick="addFriend()">
													<h2>Удалить из друзей</h2></button>';
											}
												else 
													{
														echo '<button id="add_friend" onclick="addFriend()">
														<h2>Добавить в друзья</h2></button>';
													}
						}
						else 
						{
							echo '<button id="cancel_friendship" style="background-color: rgba(180,180,180,0.8);" 
							onclick="cancelFriendship()"><h2>Отменить запрос</h2></button>';
						}
						?>
						</div>

				</div>
			<div id="friends_list_div"><div id="wideLine_div"><h2><p><a href="friends.php">Друзья</a></p></h2></div>
				<form action="user.php" method="POST">
				<table>
				<?php 
				
				$user_info = getProfileInfo('1');
				
				
				?>
					<tr>
						<td>
							<a href="user.php">
								<div id="friend_circle_avatar">
							<?php for($i = 0; $i < count($user_info);$i++){
									echo '<img src="/img/avatars/'.$user_info[$i]["avatar"].'">';
								}?>
								</div>
							</a>
						</td>
					</tr>
					
					<tr>
						<td><p><button type="submit" style="max-width:50px; overflow:hidden;">
						<?php 
								for($i = 0; $i < count($user_info);$i++){
									echo $user_info[$i]["name"];
								}
							?>
						</button></p></td>
					</tr>
					<tr>
						<td><p><input type="hidden" name="user_id" value="
						<?php 
								for($i = 0; $i < count($user_info);$i++){
									echo $user_info[$i]["id"];
								}
							?>
							"></p></td>
					</tr>
				</table>
				</form>
			</div>
			<div id="friends_list_div">
			<div id="wideLine_div"><h2><p><a href="TEST_AJAX.php">Игры</a></p></h2></div>
			<div id="friend_circle_avatar"></div><div id="friend_circle_avatar"></div><div id="friend_circle_avatar"></div>
			<div id="friend_circle_avatar"></div><div id="friend_circle_avatar"></div><div id="friend_circle_avatar"></div>
			</div>		
			</div>
			
			
			<!-- -->
			<div id="big_right_side">
			<div id="profile_info_div">
				<div id="wideLine_div">
					<h2>
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
				</div>
			<?php
				for($i = 0; $i < count($profile_info);$i++){
									$country = $profile_info[$i]["country"];
									$city = $profile_info[$i]["city"];
									$player_exp = $profile_info[$i]["player_exp"];
									$master_exp = $profile_info[$i]["master_exp"];
									$player_rep = $profile_info[$i]["player_rep"];
									$master_rep = $profile_info[$i]["master_rep"];
									$avg_rows = $profile_info[$i]["avg_rows"];
								}
				echo 
				"<table>
					<tr><th>Страна:</th> <td></td> <td>$country</td></tr>
					<tr><th>Город:</th> <td></td> <td>$city</td></tr>
					<tr><th>Опыт игры:</th> <td></td> <td>$player_exp</td></tr>
					<tr><th>Опыт работы ведущим:</th> <td></td> <td>$master_exp</td></tr>
					<tr><th>Репутация игрока:</th> <td></td> <td>$player_rep%</td></tr>
					<tr><th>Репутация ведущего:</th> <td></td> <td>$master_rep%</td></tr>
					<tr><th>Среднее количество строк в посте:</th> <td></td> <td>$avg_rows</td></tr>
				</table>";
			?>
			</div>
			<div id="characters_div"><div id="wideLine_div"><h2><p><a href="store.php">Персонажи</a></p></h2></div>
			<div id="characters_list_div">
				<div id="character_info_container">
					<div id="left_side">
						<table>
							<tr>
								<td>
									<div id="character_pic_div"><img src="/img/Стикер 1.png"></div>
								</td>
							</tr>
							<tr>
								<td>
									<div id="wideLine_div"><h2><p><a href="">Персонаж 1</a></p></h2></div>
								</td>
							</tr>
						</table>
					</div>
					<div id="right_side">
						<div id="character_info_div">
							<table>
								<tr><th>Игра: </th></tr>
								<tr><td>[Название игры] </td></tr>
								<tr><th>Биография:</th></tr>
								<tr><td>И понеслась тут биография такая длиннаяя-предлинная, интересная-преинтересная,
								аж дух захватывает, пока читаешь.
								...</td></tr>
							</table>
						</div>
					</div>
				</div>
				<div id="character_info_container">
					 <div id="left_side">
						<table>
							<tr>
								<td>
									<div id="character_pic_div"><img src="/img/Стикер 3.png"></div>
								</td>
							</tr>
							<tr>
								<td>
									<div id="wideLine_div"><h2><p><a href="">Персонаж 2</a></p></h2></div>
								</td>
							</tr>
						</table>
					</div>
					<div id="right_side">
						<div id="character_info_div">
							<table>
								<tr><th>Игра: </th></tr>
								<tr><td>[Название игры] </td></tr>
								<tr><th>Биография:</th></tr>
								<tr><td>И понеслась тут биография такая длиннаяя-предлинная, интересная-преинтересная,
								аж дух захватывает, пока читаешь.
								...</td></tr>
							</table>
						</div>
					</div>

				</div>
			</div>
		</div>

		</div>
		</div>
	</div>
	<div id="place_for_dark_wrapper">				
	</div>
	<script src="/js/user.js"></script>
	<?php require_once "blocks/footer.php" ?>
</body>
</html>