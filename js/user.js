function addFriend() {
	document.getElementById('place_for_button').style.width = '100%';
	var element = document.getElementById('place_for_button');
	
	var element = document.getElementById('add_friend');
	element.innerHTML='<button id="add_friend" onclick="addFriend()">'
										+'<h2>Добавить в друзья</h2></button>';
	var parent = element.parentNode;
	parent.removeChild(element);
	
	var element = document.getElementById('place_for_button');
	element.innerHTML='<button id="cancel_friendship" style="background-color: rgba(180,180,180,0.8);" '
							+'onclick="cancelFriendship()">'
	+'<h2>Отменить запрос</h2>'
	+'</button>';
}
function cancelFriendship() {
	var element = document.getElementById('cancel_friendship');
	var parent = element.parentNode;
	parent.removeChild(element);
	
	var element = document.getElementById('place_for_button');
	element.innerHTML='<button id="add_friend" onclick="addFriend()">'
										+'<h2>Добавить в друзья</h2></button>';
}