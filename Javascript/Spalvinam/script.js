$(document).ready(function() {

	$('.kvadratas > .mazas').on('click', function(){
		$(this).css('background-color', 'blue');
		});

	$('.kvadratas').on('mouseover', function(){
  		$(this).animate({
    	left: "+=500",
   		top:  "+=200"
  		}, 50, function() {
    // Animation complete.
  });
});





})









