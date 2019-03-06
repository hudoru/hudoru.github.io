var id;
function picking_friend_type(id) {
	switch (id){
		case 'all':
			var element = document.getElementById('online');
			element.style="background:none;";
			var element = document.getElementById('requests');
			element.style="background:none;";
			break;
		case 'online':
			var element = document.getElementById('all');
			element.style="background:none;";
			var element = document.getElementById('requests');
			element.style="background:none;";
			break;
		case 'requests':
			var element = document.getElementById('all');
			element.style="background:none;";
			var element = document.getElementById('online');
			element.style="background:none;";
			break;
	}
	var element = document.getElementById(id);
	element.style="background-color: rgba(210,0,0,0.5);";
	
}
/*function cancelFriendship() {
	var element = document.getElementById('cancel_friendship');
	var parent = element.parentNode;
	parent.removeChild(element);
	
	var element = document.getElementById('place_for_button');
	element.innerHTML='<button id="add_friend" onclick="addFriend()">'
										+'<h2>Добавить в друзья</h2></button>';
}*/