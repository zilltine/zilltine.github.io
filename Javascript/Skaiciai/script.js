
var baronas = document.getElementById("batonas");
var x = 0;
var i = 0;
var y = 0;
var sum = 0;

var skaiciai = [ ];
var max = 0;
var min = 0;


while (i != "stop") {
	i = prompt ("Iveskite (ne)savo (ne)skaicius, (ne)sveikus  (Iveskite 'stop' kad sustabdyti)");
		if (!isNaN(i) && i!= "" && i!= " " && i!= "  " && i!= "   " && i!= "    " && i!= "     ") {
		var y = Number(i);
		skaiciai[x] = y;

		if (x == 0) {
			max = y;
			min = y;
		}
		x++;
		sum += y;
		if (y > max) {
			max = y;
		}
		if (y < min) {
			min = y;
		}
	}
}


var avg = sum / skaiciai.length;
document.getElementById("suma").innerHTML = sum.toFixed(2);
document.getElementById("vidurkis").innerHTML = avg.toFixed(2);
document.getElementById("max").innerHTML = max;
document.getElementById("min").innerHTML = min;