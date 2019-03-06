<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
<?php 
$title = "Друзья";
require_once "blocks/head.php";
$profile_id = getProfileID();
$profile_info = getProfileInfo($profile_id);
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
	<?php require_once "blocks/header.php" ?>
	<div id="wrapper">
		<div id="friends_list_container">
			<div id="wideLine_div">
				<div id="all" style="background-color: rgba(210,0,0,0.5);" onclick="picking_friend_type('all');
				$('#online_friends').hide();
				$('#friend_requests').hide();
				$('#all_friends').show();">
				<h3>Все</h3></div>
				
				<div id="online" onclick="picking_friend_type('online');
				$('#all_friends').hide();
				$('#friend_requests').hide();
				$('#online_friends').show();">
				<h3>Онлайн</h3></div>
				
				<div id="requests" onclick="picking_friend_type('requests');
				$('#all_friends').hide();
				$('#online_friends').hide();
				$('#friend_requests').show();">
				<h3>Заявки</h3></div>
			</div>
	
			<div id="all_friends">
				<div id="singleFriend">
					<div id="friend_circle_avatar" style="width: 70px; height:70px;margin:1% 1% 1% 1%;">
					</div>
						<div style="height:100%;width:400px; float:left;">
							<table style="margin-left:5px;">
								<tr><td><a href=""><h2>Имя друга</h2></a></td></tr>
								<tr><td>Написать сообщение</td></tr>
							</table>
						</div>
				</div>
				<div id="singleFriend">
					<div id="friend_circle_avatar" style="width: 70px; height:70px;margin:1% 1% 1% 1%;">
					</div>
						<div style="height:100%;width:400px; float:left;">
							<table style="margin-left:5px;">
								<tr><td><a href=""><h2>Имя второго друга</h2></a></td></tr>
								<tr><td>Написать сообщение</td></tr>
							</table>
						</div>
				</div>
			</div>
			<div id="online_friends">
				<div id="singleFriend">
					<div id="friend_circle_avatar" style="width: 70px; height:70px;margin:1% 1% 1% 1%;">
					</div>
						<div style="height:100%;width:400px; float:left;">
							<table style="margin-left:5px;">
								<tr><td><a href=""><h2>Имя друга онлайн</h2></a></td></tr>
								<tr><td>Написать сообщение</td></tr>
							</table>
						</div>
				</div>
			</div>
			<script>
						var user_one = "<?php echo $user_id ?>";
						var user_two = "<?php echo $profile_id ?>";
						$(document).ready(function() {
						$("#accept_friend").bind("click", function() {
								var accept_friendship = "1";
								var add_friend = "2";
								$.ajax({
									url: "make_friends.php",
									type: "POST",
									data: ({accept_friendship:accept_friendship, add_friend:add_friend, user_one:user_one, user_two:user_two}),
									dataType: "html"
									});
								
							});
							/*$("#cancel_friendship").bind("click", function() {
								var add_friend ="";
								var cancel_friendship="1";
								$.ajax({
									url: "make_friends.php",
									type: "POST",
									data: ({add_friend:add_friend, user_one:user_one, user_two:user_two}),
									dataType: "html"
								});
							});*/
							});
							
						</script>
			<div id="friend_requests">
				<?php
					$request_info=getData ('*','friends','user_two',"'$profile_id' AND friendship_official='0'"); 
					for($i=0;$i<count($request_info);$i++) 
					{
						$user_id=$request_info[$i]["user_one"]; 
						$user_info=getData ('*','users','id',$user_id); 
						session_start();
						$_SESSION["user_id"] = $user_id;
						
						echo 
							'<form action="user.php" method = "POST">
								<div id="singleFriend"> 
								<div id="friend_circle_avatar" style="width: 70px; height:70px;margin:1% 1% 1% 1%;"> 
								<img src="img/avatars/'.$user_info[0]["avatar"].'"> 
									</div> 
									<div style="height:100%;width:290px; float:left;"> 
									<table style="margin-left:5px;"> 
									<tr><td><button name="user"><a><h3>'.$user_info[0]["name"].'</h3></a></button>
									<tr><td>Написать сообщение</td></tr> 
								</table> 
								</div> 
								<div id="accept-decline">
							<img id="accept_friend" src="img/accept_circle.png" title="Добавить в друзья"><img src="img/decline_cross3.png" title="Отклонить">
							</div>
								</div>
								<input name="user_id" type="hidden" value="'.$user_id.'"></input>
							</form>';
					}
				?>
				<!--<div id="singleFriend">
					<div id="friend_circle_avatar" style="width: 70px; height:70px;margin:1% 1% 1% 1%;">
					</div>
						<div style="height:100%;width:290px; float:left;">
							<table style="margin-left:5px;">
								<tr><td><a href=""><h2>Заявка в друзья</h2></a></td></tr>
								<tr><td>Написать сообщение</td></tr>
							</table>
						</div><div id="accept-decline">
							<img src="img/accept_circle.png" title="Добавить в друзья"><img src="img/decline_cross3.png" title="Отклонить">
							</div>
				</div>-->
			</div>
				<!--<script>
				$('#all_friends').hide();
				$('#online_friends').hide();
				$('#friend_requests').hide();
			</script>-->
		</div>
	</div>
	<script src="js/friends.js"></script>
	<?php require_once "blocks/footer.php";
	ob_end_flush();?>
</body>
</html>