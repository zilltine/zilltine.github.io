



		// <input type="number" id="suma">
		// <input type="checkbox" id="pristatymas">
		// <input type="text" id="miestas">
		// <span type="submit" id="darom">Darom </span>


var kaina = document.getElementById("suma");
var miestas = document.getElementById('miestas');
var darom = document.getElementById("darom");
var pristatymas = document.getElementById("pristatymas");

// function check() {
// 	 if (pristatymas.checked)
//     {
//         alert( "tiesa " + pristatymas);
//     }
//     else
//     {
//         alert( "melas " + pristatymas);
//     }
// }




darom.addEventListener('click', function() {

	
 	if ((kaina.value) && (((pristatymas.checked) && (miestas.value)) || (pristatymas.unchecked))) {

 		if  (!(pristatymas.checked)) {
 			var i = kaina.value;
 			document.getElementById("kaina").innerHTML = "Visa suma: " + i + " Eur";
 			document.getElementById("msg").innerHTML = "Preke galite atsiimti Gedimino pr. 19";
 		}
	 		else if	(kaina.value >= 50 || miestas.value == "Vilnius") {
	 			var i = kaina.value;
	 			document.getElementById("kaina").innerHTML = "Visa suma: " + i + " Eur";
	 			document.getElementById("msg").innerHTML = "Preke pristatysime per 3d.d.";
	 		}
		 		else {
		 			var i = Number(kaina.value);
		 			var x = i + 20;
		 			document.getElementById("kaina").innerHTML = "Visa suma: " + x + " Eur";
		 			document.getElementById("msg").innerHTML = "Preke pristatysime per 3d.d.";
		 		} 
 		}
 		
 	

 	else {
 		alert("Iveskite duomenis!");
 	}

	//


	//document.getElementById("bepvm").innerHTML = y;
});