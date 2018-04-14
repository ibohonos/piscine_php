window.onload = function() {
	ft_get_todos();
	document.getElementById("new").addEventListener("click", add_elem);
}

function ft_setCookie(name, val, days) {
	var d = new Date();
	d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = name + "=" + val + ";" + expires + ";path=/";
}

function ft_getCookie(cname) {
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

function ft_delete_elem(elem_id)
{
	if (confirm("Do you really want to delete this task?"))
	{
		document.getElementById(elem_id).remove();
		var list = document.getElementById("ft_list");
		var arr = [];
		for (i = 0; i < list.children.length; i++) {
			arr[i] =  list.children[i].innerHTML;
		}
		json_array = JSON.stringify(arr);
		ft_setCookie("todo_list", json_array, 1);
	}
}

function add_elem() {
	var elem = document.createElement("div");
	var list = document.getElementById("ft_list");
	var result = prompt("What should you do?");
	var arr = [];

	if (result) {
		elem.innerHTML = result;
		elem.id = "elem" + list.children.length;
		elem.setAttribute("class", "element");
		elem.setAttribute('onclick', 'ft_delete_elem(this.id)');
		if (list.firstChild) {
			list.insertBefore(elem, list.children[0]);
		} else {
			list.appendChild(elem);
		}
		for (i = 0; i < list.children.length; i++) {
			arr[i] =  list.children[i].innerHTML;
		}
		json_array = JSON.stringify(arr);
		ft_setCookie("todo_list", json_array, 1);
	}
}

function ft_get_todos()
{
	var list = document.getElementById("ft_list");
	if (ft_getCookie("todo_list") !== "") {
		var arr = JSON.parse(ft_getCookie("todo_list"));
		for (i = 0; i < arr.length; i++) {
			var elem = document.createElement("div");
			elem.innerHTML = arr[i];
			elem.id = "elem" + i;
			elem.setAttribute("class", "element");
			elem.setAttribute('onclick', 'ft_delete_elem(this.id)');
			list.appendChild(elem);
		}
	}
}
