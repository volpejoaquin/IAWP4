$(document).ready(function(){
	ratingA =  $('[class=ratingNum]').html();
	rating = 0.0;

	
	$('[id^=rat]').mouseover(function(data) {
	
	  if ($(this).attr("id")[4] != undefined) {
		r = 10;
	  } else {
		r = $(this).attr("id")[3];
	  }
	  r -= 1;
	  
	  prev = $('#rat'+r);
	  while (prev.attr("id") != undefined) {
		prev.attr("src","/IAWP4/img/rating-chico.png");
		r -= 1;
		prev = $('#rat'+r);
	  }
	  
	  $(this).attr("src","/IAWP4/img/rating-chico.png");
	  
	  if ($(this).attr("id")[4] != undefined) {
		r = 10;
	  } else {
		r = $(this).attr("id")[3];
	  }
	  r++;
	  next = $('#rat'+r);
	  while (next.attr("id") != undefined) {
		next.attr("src","/IAWP4/img/rating-chico-osc.png");
		r++;
		next = $('#rat'+r);
	  }
	  

	  contarRating();
	  
	  $('[class=ratingNum]').html(rating+".0");
	});
	
	
	$('#botonRating').mouseout(function(data) {
	  i=0;
	  next = $('#rat1');
	  while (i <= ratingA) {
		next.attr("src","/IAWP4/img/rating-chico.png");
		i++;
		next = $('#rat'+i);		
	  }
	  
	  if (ratingA - i != -1) {
			next.attr("src","/IAWP4/img/rating-chico-medio.png");
			//cant = $i;
			i++;	
			next = $('#rat'+i);			
	   } 
		
	  
	  
	  
	   while (i <= 10) {
		next.attr("src","/IAWP4/img/rating-chico-osc.png");
		i++;
		next = $('#rat'+i);		
	  }
	 
	  $('[class=ratingNum]').html(ratingA);
	});
	
	$('[id^=rat]').parent().click(function(data) {
			$(this).attr("href",$(this).attr("href")+"/"+rating);
	});
	
	function contarRating() {
	  rating = 0.0;
	  i = 1;
	  next = $('#rat1');
	  while (next != undefined && next.attr("src") != undefined) {
		if (next.attr("src").indexOf("rating-chico-osc") == -1) {
			rating += 1.0;
		}		
		i++;
		next = $('#rat'+i);
	  }
	}
});