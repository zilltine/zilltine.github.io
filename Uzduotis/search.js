$(document).ready(function(){
	$('#search').on('input', function(){
		var input = $('#search').val();
		if (input.length > 0){
			$("#result").load("showUser.php", {
				input: input
			});
		}
		else {
			$("#result").html('');
		}
	});


	$(".fa-check").click(function(){
		 $(this).parent().toggleClass('checked');
		var id = $(this).siblings()[2];
		var status = $(this).siblings()[1];
		id = id.innerHTML;
		status = status.innerHTML;
		console.log(status);
		$.post("completeTask.php", {
			id: id,
			status: status
		});
	});
});