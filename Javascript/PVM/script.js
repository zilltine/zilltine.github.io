
var kaina = document.getElementById("suma");
var darom = document.getElementById("darom");

darom.addEventListener('click', function() {
	var kaina = document.getElementById("suma").value;
	var i = 21*kaina;
	var x = i/100;

	document.getElementById("pvm").innerHTML = x;
	var i = 79*kaina;
	var y = i/100;

	document.getElementById("bepvm").innerHTML = y;
});


 
// function imam()  {
// 	var kaina = document.getElementById("suma").value;
// 	return kaina;
// }

// var a = darom();

// console.log(a);

// var kaina = mygtukas();

