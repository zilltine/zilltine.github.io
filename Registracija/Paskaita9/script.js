$(document).ready(function(){
	$('.edit').on ('click',function(){
		$.ajax({
           method: "POST",
           dataType: "json",
           url: 'Functions.php',
           data:{msg:'now'},
           success: function(data){
           alert("wee");
           }
		
      });
		$('#table').load('Load.php');
		prompt ("top");
	});
});