/* 
 * JavaScript para Add Movie
 * Conexion al WebService y funciones relacionadas
 */

var API_KEY= "5mmm2qe2qr4asyqpsnv5ykqr";
var BASE_URI= "http://api.rottentomatoes.com/api/public/v1.0";

$(document).ready(function(){
    
    $('rotten').click(rottenClick);
  
});

function rottenClick()
{
    alert("nombre");
}

function buscarPeli(nombre)
{
    var url=BASE_URI+'/movies.json?apikey='+API_KEY;
    
        //Info sobre el search
    	$.getJSON(encodeURI(url+"&q="+nombre), function(data) {
       
        var arrayPelis = data.movies;
        
        if (data.total > 1)
        { //mas de un resultado...resolver cual agarrar
        }
        
        var peli = data.movies[0];
        var page_peli=data.movies.links.self;
        
        
        
       
      //  var urlPeli = 
        
        
        
        
        
        
        });
    
}


