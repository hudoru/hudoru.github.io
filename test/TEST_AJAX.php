<!DOCTYPE html>
<html>
<head>
<?php 
$title = "Главная";
require_once "blocks/head.php";
$profile_id = getProfileID();
$profile_info = getProfileInfo($profile_id);
$sa = "Наруто";
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
	<?php require_once "blocks/header.php" ?>
						<script>
						/*function funcBefore() {
							$("#information").text ("Ожидайте...");
						}
						function funcSuccess(data) {
							$("#information").text (data);
						}
						$(document).ready(function() {
							$("#load").bind("click", function() {
								var sa = "<?php echo $sa ?>";
								$.ajax({
									url: "cancel_friend_require.php",
									type: "POST",
									data: ({name: sa}),
									dataType: "html",
									beforeSend: funcBefore,
									success: funcSuccess
								});
							});
						});*/
						/*$(document).ready(function(){
							var load = $("p");
							load.click(function() {
								var text = "Текст";
								$.ajax({
								url: "cancel_friend_require.php",
								type: "POST",
								data: {text: text},
								beforeSend:function() {
							$("#information").text ("Ожидайте...");
						}
								success: function(data) {
							$("#information").text (data);
						}
								})
							})
						})*/
						</script>
						<p id="load" style="cursor:pointer;">Нажми сюда</p>
						<div id="information"></div>
							<?php require_once "blocks/footer.php" ?>
</body>
</html>