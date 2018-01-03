var vardas = $('#vardas');
var pavarde = $('#pavarde');
var amzius = $('#amzius');
var btn = $('#prideti');
var btn2 = $('#pirmasout');
var btn3 = $('#paskutinisout');
var table = $('table');

$(document).ready(function(){

		btn.on('click', function() {
		if (vardas.val() && pavarde.val() && amzius.val()) {
			table.append("<tr><td>" + vardas.val() + "</td><td>" + pavarde.val() + "</td><td>" + amzius.val() + "</td></tr>");
		}
		else {
			alert('iveskite duomenis');
		}
	})
	btn2.on('click', function() {
		$('table tr:nth-child(2)').remove();
	});
	btn3.on('click', function() {	
		$('table tr:last').remove();
	});

	



});
