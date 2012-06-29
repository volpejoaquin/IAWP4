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
		var src = prev.attr("src").split("/");
		src[3] = "rating-chico.png";
		prev.attr("src",src.join("/"));
		r -= 1;
		prev = $('#rat'+r);
	  }
	  
		var src =  $(this).attr("src").split("/");
		src[3] = "rating-chico.png";
		$(this).attr("src",src.join("/"));
	  
	  
	  if ($(this).attr("id")[4] != undefined) {
		r = 10;
	  } else {
		r = $(this).attr("id")[3];
	  }
	  r++;
	  
	  next = $('#rat'+r);
	  while (next.attr("id") != undefined) {
		var src = next.attr("src").split("/");
		src[3] = "rating-chico-osc.png";
		next.attr("src",src.join("/"));
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
		var src = next.attr("src").split("/");
		src[3] = "rating-chico.png";
		next.attr("src",src.join("/"));
		i++;
		next = $('#rat'+i);		
	  }
	  
	  if (ratingA - i != -1) {
			var src = next.attr("src").split("/");
			src[3] = "rating-chico-medio.png";
			next.attr("src",src.join("/"));
			i++;	
			next = $('#rat'+i);			
	   } 

	   while (i <= 10) {
		var src = next.attr("src").split("/");
		src[3] = "rating-chico-osc.png";
		next.attr("src",src.join("/"));
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