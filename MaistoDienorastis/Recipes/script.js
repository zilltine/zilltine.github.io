$(document).ready(function(){
	$("#searchProduct").on("input",function(){
		var search = $("#searchProduct").val();
		if (search.length>0){
			$("#result").load("result.php", {
				search: search
			})
		}
		else{
			document.getElementById("result").innerHTML = "Ieskokite produktu";
		}
	});
});

$(document).ready(function(){
	$("#recipeButton").click(function(event){
		event.preventDefault();
		var id = new Array();
		var amount = new Array();
		var ingredientName = new Array();
		$('.ingredient').each( function(index){
			id[index] = $(this).find('.ingredientId').val();
			amount[index] = $(this).find('.ingredientAmount').val();
			ingredientName[index] = $(this).find('.ingredientName').text();
		});
		var description = $("#descriptionRichText").contents().find("body").html()
		var name = $("#recipeName").val();
		var image = document.getElementById("output").src;
		var allGood = 'true';
		if (!id[0]){
			$("#errorMsg").text("Pasirinkite produktus");
			var allGood = 'false';
		}
		if (!amount[0]){
			$("#errorMsg").text("Pasirinkite produktų kiekį");
				var allGood = 'false';
		}
		if (!description){
			$("#errorMsg").text("Aprasykite savo recepta");
			var allGood = 'false';
		}
		if (!name){
			$("#errorMsg").text("Pasirinkite recepto pavadinimą");
			var allGood = 'false';
		}
		if (name.length > 44){
			$("#errorMsg").text("Pavadinimo ilgis turi būti iki 45 simbolių");
			var allGood = 'false';
		}
		if (allGood === 'true'){
			$("#recipePreview").load('tempRecipe.php', {
				id : id,
				amount : amount,
				description : description,
				name : name,
				ingredientName : ingredientName,
				image : image
			});
		}
	});
});
$(document).ready(function(){
	$("#file").on('change', function(event){
		var file = document.getElementById('file');
		var fReader = new FileReader();
		var img = file.files[0];
		var size = img.size;
		var type = img.type;
		if (type === "image/gif" || type === "image/jpeg" || type === "image/png" || type === "image/jpg"){
			if (size < 5000000){
				fReader.readAsDataURL(file.files[0]);
				fReader.onloadend = function(event){
				    var img = document.getElementById("output");
				    img.src = event.target.result;
				}
			}
			else {
				alert("Nuotrauka turi būti mažesnė nei 5MB");
			}
		}
		else {
			alert("Tai nėra nuotrauka. Naudokite .jpeg .jpg .png .gif formatus.");
		}
	});
});
$(document).ready(function(){
	$("body").on('click', '.removeIngredient', function(event){
		$(this).parent().remove();
	});
});

var editorDoc;
$(document).ready(function(){
	editorDoc = document.getElementById('descriptionRichText').contentWindow.document;
	var editorBody = editorDoc.body;
  	if ('spellcheck' in editorBody) {    
        editorBody.spellcheck = false;
    }

    if ('contentEditable' in editorBody) {
        editorBody.contentEditable = true;
    }
    else if ('designMode' in editorDoc) {
            editorDoc.designMode = "on";                
    }     
});


$(document).ready(function(){
	$("#italic").click(function(){
    editorDoc.execCommand('italic', false, null);
	});
});

$(document).ready(function(){
	$("#bold").click(function(){
    editorDoc.execCommand('bold', false, null);
	});
});

$(document).ready(function(){
	$("#underline").click(function(){
    editorDoc.execCommand('underline', false, null);
	});
});

$(document).ready(function(){
	$("#color").on('change',function(){
		console.log(document.getElementById("color").value)
    	editorDoc.execCommand('forecolor', false, document.getElementById("color").value);
	});
});

$(document).ready(function(){
	$("#size").click(function(){
    editorDoc.execCommand('fontSize', false, prompt("Dydis nuo 1 iki 7"));
	});
});

$(document).ready(function(){
	$("#ul").click(function(){
    editorDoc.execCommand('insertUnorderedList', false, null);
	});
});