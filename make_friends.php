<?php
	require_once "functions/functions.php";

		$add_friend = $_POST['add_friend'];
		$cancel_friendship = $_POST['cancel_friendship'];
		$user_one = $_POST['user_one'];
		$user_two = $_POST['user_two'];
		$accept_friendship = $_POST['accept_friendship'];
		if($add_friend=="1")
		{
			insertData('friends', "`user_one`,`user_two`,`friendship_official`", "'$user_one','$user_two','0'");
		}
		if($add_friend=="")
		{
				deleteData('friends',"`user_one` = '$user_one' AND `user_two`='$user_two'");
		}
		if ($add_friend=="2")
		{
			updateData('rp_db','friends','`friendship_official`',"1","`user_two`='$user_two' AND `user_one`","'$user_ones'");
		}
		
		/*else if($cancel_friendship>0&&$add_friend==0)
		{
			$user_one = $_POST['user_one'];
			$user_two = $_POST['user_two'];
			//deleteData('friends',"`user_one` = '$user_one' AND `user_two`='$user_two'");
			//deleteData('friends',"`user_one` = '$profile_id' AND `user_two`='$user_id'");
			insertData('friends', "`user_one`,`user_two`,`friendship_official`", "'$user_one','$user_two','0'");
		}*/
?>