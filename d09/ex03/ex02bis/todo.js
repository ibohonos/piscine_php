$(document).ready(function() {
	ft_get_todos();
	$("#new").click(add_elem);
});

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
		$("#" + elem_id).remove();
		var list = $("#ft_list");
		json_array = JSON.stringify(list.html());
		ft_setCookie("todo_list", json_array, 1);
	}
}

function add_elem() {
	var elem = $("<div></div>");
	var list = $("#ft_list");
	var result = prompt("What should you do?");

	if (result) {
		elem.addClass("element");
		elem.attr('id', "elem" + list.children().length);
		elem.attr('onclick', 'ft_delete_elem(this.id)');
		elem.text(result);
		list.prepend(elem[0]);
		json_array = JSON.stringify(list.html());
		ft_setCookie("todo_list", json_array, 1);
	}
}

function ft_get_todos()
{
	var list = $("#ft_list");
	if (ft_getCookie("todo_list") !== "") {
		var arr = JSON.parse(ft_getCookie("todo_list"));
		list.html(arr);
	}
}
