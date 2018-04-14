// var ft_list;
// var cook = [];

// window.onload = function () {
// 	document.getElementById("new").addEventListener("click", newList);
// 	ft_list = document.getElementById("ft_list");
// 	var tmp = document.cookie;
// 	if (tmp) {
// 		cook = JSON.parse(tmp);
// 		cook.forEach(function (e) {
// 			addList(e);
// 		});
// 	}
// };

// window.onunload = function () {
// 	var todo = ft_list.children;
// 	var newCookie = [];
// 	for (var i = 0; i < todo.length; i++)
// 		newCookie.unshift(todo[i].innerHTML);
// 	document.cookie = JSON.stringify(newCookie);
// };

// function newList(){
// 	var todo = prompt("What should you do?", '');
// 	if (todo !== '') {
// 		addList(todo)
// 	}
// }

// function addList(todo){
// 	var div = document.createElement("div");
// 	div.innerHTML = todo;
// 	div.addEventListener("click", deleteList);
// 	ft_list.insertBefore(div, ft_list.firstChild);
// }

// function deleteList(){
// 	if (confirm("Do you really want to delete this task?")){
// 		this.parentElement.removeChild(this);
// 	}
// }







window.onload = function()
{
	get_todo();
	document.getElementById("new").addEventListener("click", add_elem);
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

function delete_elem(elem_id)
{
	if (confirm("Delete task?"))
	{
		document.getElementById(elem_id).remove();

		var list = document.getElementById("ft_list");
		var array = [];
		for (i = 0; i < list.children.length; i++) {
			array[i] =  list.children[i].innerHTML;
		}
		json_array = JSON.stringify(array);
		setCookie("todo_list", json_array, 1);
	}
}

function add_elem() {
	var elem = document.createElement("div");
	var list = document.getElementById("ft_list");
	var result = prompt("What shall we do first?");
	elem.innerHTML = result;
	elem.id = "elem" + list.children.length;
	elem.setAttribute('onclick', 'delete_elem(this.id)');
	if (list.firstChild)
	{
		list.insertBefore(elem, list.children[0]);
	}
	else
	{
		list.appendChild(elem);
	}
	var array = [];

	for (i = 0; i < list.children.length; i++) {
		array[i] =  list.children[i].innerHTML;
	}
	json_array = JSON.stringify(array);
	setCookie("todo_list", json_array, 1);

}

function get_todo()
{
	var list = document.getElementById("ft_list");
	if (getCookie("todo_list") !== "") {
		var array = JSON.parse(getCookie("todo_list"));
		for (i = 0; i < array.length; i++) 
		{
			var elem = document.createElement("div");
			elem.innerHTML = array[i];
			elem.id = "elem" + i;
			elem.setAttribute('onclick', 'delete_elem(this.id)');
			list.appendChild(elem);
		}
	}
}
