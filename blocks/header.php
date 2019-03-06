	<header>
		<div id="menuHead">
			<table>
				<tr>
					<td><a href="index.php"> Профиль</a></td><td><div class="divider_div"></div><td>		
					<td><a href="friends.php">Работа</a></td><td><div class="divider_div"></div><td>

					<?php
					/*$select_field="*";$table="friends";$where_field="user_two='$profile_id' AND friendship_official";$value="'0'";$count=0;
			$result_value=getData ($select_field,$table,$where_field,$value);
								if(count($result_value)>0)echo '+'.count($result_value);*/
					?>
					
					<td><a href="messages.php"> Сообщения</a></td><td>+2<td><div class="divider_div"></div><td>
				 </tr>
			 </table>
		</div>
		
		<div id="bellIcon">
			<img src="img/bell.png">
			<div id="notifications_counter"></div>
			
		</div>
	</header>