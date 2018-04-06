$(document).ready(function(){
	$("#search").on("input",function(){
		var search = $("#search").val();
		if (search.length>0){
			$("#recipeResult").load("recipeResult.php", {
				search: search
			})
		}
		else{
			document.getElementById("recipeResult").innerHTML = "Ieskokite receptu";
		}
	});
});