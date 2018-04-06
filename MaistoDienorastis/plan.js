$(document).ready(function(){
	$("body").on("input", ".recipes", function(){
		var search = $(this).val();
		if (search.length>0){
			$(this).siblings(".result").load("recipesSearch.php", {
				search: search
			})
		}
		else{
			$(this).siblings(".result").empty();
		}
	});
});

$(document).ready(function(){
	$("body").on("input", ".products", function(){
		var search = $(this).val();
		if (search.length>0){
			$(this).siblings(".result").load("productsSearch.php", {
				search: search
			})
		}
		else{
			$(this).siblings(".result").empty();
		}
	});
});

$(document).ready(function(){
	$("body").on('click', '.remove', function(){
		$(this).parent().remove();
	});
});

$(document).ready(function(){
	$("#previewPlan").on('click', function(){
		var productId = new Array();
		var productAmount = new Array();
		var productName = new Array();
		var productDate = new Array();
		$('.addedProduct').each( function(index){
			productId[index] = $(this).find('.id').val();
			productAmount[index] = $(this).find('.productsAmount').val();
			productName[index] = $(this).find('.productsName').text();
			productDate[index] = $(this).parent().parent().parent().find('.dateInput').val();
			
		});
		var recipeId = new Array();
		var recipeAmount = new Array();
		var recipeName = new Array();
		var recipeDate = new Array();
		$('.addedRecipe').each( function(index){
			recipeId[index] = $(this).find('.id').val();
			recipeAmount[index] = $(this).find('.recipeAmount').val();
			recipeName[index] = $(this).find('.recipeName').text();
			recipeDate[index] = $(this).parent().parent().parent().find('.dateInput').val();	
		});
		$('#sidebar').load('planPreview.php', {
			productId : productId,
			productAmount : productAmount,
			recipeId : recipeId,
			recipeAmount : recipeAmount,
			productDate : productDate,
			recipeDate : recipeDate
		});
	});
});

$(document).ready(function(){
	$('body').on('change', '.dateInput', function(){
		var time = $(this).val();
		var timeString = giveDateString(time);
		$(this).siblings().html(timeString);

	});
});

function setLastTime(){
	var last = $('.dateInput').last();
	var time = last.val();
	var timeString = giveDateString(time);
	last.siblings().html(timeString);
};
function giveDateString(time){
	var time = Date.parse(time);
	var d = new Date(time);
	var date = d.getUTCDate();
	var month = d.getUTCMonth()+1;
	var menesiai = Array('Sausio', 'Vasario', 'Kovo', 'Balandžio', 'Gegužės', 'Birželio', 'Liepos', 'Rugpjūčio', 'Rugsėjo', 'Spalio', 'Lapkričio', 'Gruodžio');
	var menuo = menesiai[month];
	var day = d.getUTCDay();
	var dienos = Array('Sekmadienis', 'Pirmadienis', 'Antradienis', 'Trečiadienis', 'Ketvirtadienis', 'Penktadienis', 'Šeštadienis');
	var diena = dienos[day];
	return menuo+" "+date+"d.,    "+diena;
}
$(document).ready(function(){
	$("#addBtn").on('click', function(){
		var time = $('.dateInput').last().val();
		var time = Date.parse(time) + 86400000;
		var d = new Date(time);
		var newTime = d.toString();
		var date = d.getUTCDate();
		var date = date.toString();
		if (date.length < 2){
			date = "0"+date;

		}
		var month = d.getUTCMonth()+1;
		var month = month.toString();
		if (month.length < 2){
			month = "0"+month;
		}
		var y = d.getUTCFullYear();
		$("#main").append('<div class="dayContainer">'+
			'<div class="date">'+
			'<input type="date" class="dateInput" value="'+y+'-'+month+'-'+date+'"><span class=".displayDate">'+giveDateString(newTime)+'</span>'+
		'</div>'+
		'<div class="breakfast">'+
			'<input type="search" class="recipes" name=""><span>Rasti recepta</span>'+
			'<input type="search" class="products" name=""><span>Rasti produktus</span>'+
			'<div class="result">'+
			'</div>'+
			'<div class="selected">		'+	
			'</div>'+
		'</div>'+
		'<div class="lunch">'+
			'<input type="search" class="recipes" name=""><span>Rasti recepta</span>'+
			'<input type="search" class="products" name=""><span>Rasti produktus</span>'+
			'<div class="result">'+
			'</div>'+
			'<div class="selected">	'+		
			'</div>'+
		'</div>'+
		'<div class="dinner">'+
			'<input type="search" class="recipes" name=""><span>Rasti recepta</span>'+
			'<input type="search" class="products" name=""><span>Rasti produktus</span>'+
			'<div class="result">'+
			'</div>'+
			'<div class="selected">	'+		
			'</div>'+
	'	</div>'+
		'<div class="snacks">'+
			'<input type="search" class="recipes" name=""><span>Rasti recepta</span>'+
			'<input type="search" class="products" name=""><span>Rasti produktus</span>'+
			'<div class="result">'+
			'</div>'+
			'<div class="selected">	'+		
			'</div>'+
		'</div>'+
	'</div>'
			);
	});
});
$(document).ready(function(){
	setLastTime();
});