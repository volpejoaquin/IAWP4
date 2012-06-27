$(document).ready(function(){
	rating = 0.0;
	ant = "rat0",act = "rat0";
	dir = "derecha";
	
	$('[id^=rat]').mouseover(function(data) {
	  i = 0;
	  prev = $(this).prev();
	  while (prev.attr("id") != undefined) {
		prev.attr("src","/IAWP4/img/rating-chico.png");
		prev = prev.prev();
		i++;
	  }
	  
	  $(this).attr("src","/IAWP4/img/rating-chico.png");
	  
	  next = $(this).next();
	  while (next.attr("id") != undefined) {
		next.attr("src","/IAWP4/img/rating-chico-osc.png");
		next = next.next();
	  }

	  ant = $(this).attr("id");
	  
	  if (act[3] - ant[3] >= 0) {
		dir = "izquierda";
	  } else {
		dir = "derecha";
	  }
	  contarRating();
	  
	  $('[class=ratingNum]').html(rating);
	});
	
	
	$('[id^=rat]').mouseout(function(data) {
	  act = $(this).attr("id");


	  if (act == "rat1" && dir.indexOf("izquierda") == 0) {
		$(this).attr("src","/IAWP4/img/rating-chico-osc.png");
		rating = 0.0;
	  }	  
	 
	  $('[class=ratingNum]').html(rating);
	});
	
	$('#botonRating').click(function() {
		console.log(rating);
	});
	
	function contarRating() {
	  rating = 0.0;
	  next = $('#rat1');
	  while (next != undefined && next.attr("src") != undefined) {
		if (next.attr("src").indexOf("rating-chico-osc") == -1) {
			rating += 1.0;
		}		
		next = next.next();
	  }
	}
});