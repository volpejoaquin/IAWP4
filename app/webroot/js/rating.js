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
	  
	  rating = i + 1;
	  
	  console.log(rating);
	  
	  if (act[3] - ant[3] >= 0) {
		dir = "izquierda";
	  } else {
		dir = "derecha";
	  }
	});
	
	
	$('[id^=rat]').mouseout(function(data) {
	  act = $(this).attr("id");
	  if (dir.indexOf("derecha") != -1) {
		$(this).attr("src","/IAWP4/img/rating-chico.png");	
		rating += 1.0;
	  } else {
		rating -= 1.0;
	  }
	  
	  if (act.indexOf("rat1") != -1 && $(this).next().attr("src").indexOf("rating-chico-osc") != -1) {
		$(this).attr("src","/IAWP4/img/rating-chico-osc.png");
		rating = 0.0;
	  }	  
	});
});