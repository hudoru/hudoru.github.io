<?php
	require_once "functions/functions.php";

		$add_friend = $_POST['add_friend'];
		$cancel_friendship = $_POST['cancel_friendship'];
		$user_one = $_POST['user_one'];
		$user_two = $_POST['user_two'];
			if($add_friend=="")
		{
			deleteData('friends',"`user_one` = '$user_one' AND `user_two`='$user_two'");
		}

			
			//deleteData('friends',"`user_one` = '$user_one' AND `user_two`='$user_two'");
			//insertData('friends', "`user_one`,`user_two`,`friendship_official`", "'$user_one','$user_two','0'");
?>