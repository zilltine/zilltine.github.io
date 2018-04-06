$(document).ready(function(){
	$("#addProduct").click(function(event){
		event.preventDefault();
		var name = $("#name").val();
		var kcal = $("#kcal").val();
		var fat = $("#fat").val();
		var carbs = $("#carbs").val();
		var protein = $("#protein").val();
		var measure_by = $("#measure_by").val();
		$("#productMessage").load("addProduct.php", {
			name: name,
			kcal: kcal,
			fat: fat,
			carbs: carbs,
			protein: protein,
			measure_by: measure_by
		});
	});

	$("#searchProduct").on("input",function(){
		var search = $("#searchProduct").val();
		if (search.length>0){
			$("#result").load("result.php", {
				search: search
			})
		}
		else{
			document.getElementById("result").innerHTML = "";
		}
	});
});