var ft_list;

$(document).ready(function(){
	$('#new').click(add_elem);
	ft_list = $('#ft_list');
	ft_get_todos();
});

function ft_get_todos(){
	ft_list.empty();
	ft_aj('select.php', "GET", null, function(data){
		data = jQuery.parseJSON(data);
		jQuery.each(data, function(i, val) {
			ft_list.prepend($('<div class="element" id="' + i + '" onclick="ft_delete_elem(this.id);">' + val + '</div>'));
		});
	});
}

function add_elem(){
	var todo = prompt("What should you do?");
	if (todo !== '') {
		ft_aj('insert.php?todo=' + todo, "GET", null, ft_get_todos);
	}
}

function ft_delete_elem(id){
	if (confirm("Do you really want to delete this task?")){
		ft_aj('delete.php?id=' + id, "GET", null, ft_get_todos);
	}
}

function ft_aj(url, method, data, success) {
	$.ajax({
		method: method,
		url: url,
		data: data
	})
	.done(function (data) {
		success(data);
	});
}
