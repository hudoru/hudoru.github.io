<!DOCTYPE html>
<html>
<head>
<?php 
$title = "Сообщения";
require_once "blocks/head.php"
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<!--
<script>
$(document).ready (function() {
	$("#send_message").click (function (){
		$("#messageShow").hide();
		var name="Антонов Кирилл";
		var email = "aKiraAntonov@yandex.ru";
		var subject = "Регистрация на сайте";
	var message = $("#message").val ();
	var fail = "";
	if(message.length < 5) fail = "Не меньше 5-и символов";
	if(fail != ""){
		$('#messageShow').html (fail + "<div class='clear'><br></div>");
		$('#messageShow').show ();
		return false;
	}
	$.ajax ({
		url:'/ajax/messages.php',
		type: 'POST',
		cache: false;
		date: {'message': message},
		dataType: 'html',
		success: funtion (data){
			if(data == 'Сообщение отправлено'){
				$('#messageShow').html (data + "<div class='clear'><br></div>");
				$('#messageShow').show ();
			}
		}
	})
	});
});
	</script>
	-->
</head>
<body>
	<?php require_once "blocks/header.php" ?>
	<div id="wrapper">
	<div id="messages_container_div">
	<div id="messages_left_div">
	<div id="sender"><div id="friend_circle_avatar"></div></div>
	<div id="sender"><div id="friend_circle_avatar"></div></div>
	<div id="sender"><div id="friend_circle_avatar"></div></div>
	<div id="sender"><div id="friend_circle_avatar"></div></div>
	<div id="sender"><div id="friend_circle_avatar"></div></div>
	<div id="sender"><div id="friend_circle_avatar"></div></div>
	<div id="sender"><div id="friend_circle_avatar"></div></div>
	<div id="sender"><div id="friend_circle_avatar"></div></div>
	<div id="sender"><div id="friend_circle_avatar"></div></div>
	<div id="sender"><div id="friend_circle_avatar"></div></div>
	</div>
	<div id="messages_right_div">
	<div id="wideLine_div"><h2><p>Гений</p></h2></div>
	<div id="display_messages_div">
		<div id="single_message">
			<div id="left_side">
				<div id="friend_circle_avatar"></div>
			</div>
			<div id="right_side">
				<table>
					<tr><th>Гений</th></tr>
					<tr><td>Лол</td></tr>
				</table>	
			</div>
		</div>
		<div id="single_message">
			<div id="left_side">
				<div id="friend_circle_avatar"></div>
			</div>
			<div id="right_side">
				<table>
					<tr><th>Гений</th></tr>
					<tr><td>Лол</td></tr>
				</table>	
			</div>
		</div>
	</div>
	
		<div id="writing_message_container_div">
		<form>
<textarea name="message" id="message" placeholder="Введите сообщение..."></textarea>
				<input type="image" src="/img/send_message_icon2.png" name="send_message" id="send_message" value="">
			<div id="messageShow"></div>
		</form>
		</div>
	</div>
	</div>
	</div>
	
	<?php require_once "blocks/footer.php" ?>
</body>
</html>