/* 
 * JavaScript para Add Movie
 * Conexion al WebService y funciones relacionadas
 */

var API_KEY= "5mmm2qe2qr4asyqpsnv5ykqr";
var BASE_URI= "http://api.rottentomatoes.com/api/public/v1.0";

$(document).ready(function(){
    
  //  $('rotten').click(rottenClick);
    $('#rotten').bind('click',rottenClick);
  
});

function rottenClick()
{
    var nombre = $('#movieNameSearch').val();
    
   // alert(nombre);
   // alert($("movieNameSearch").text());
   buscarPeli(nombre);
}

function buscarPeli(nombre)
{
      
    var url=BASE_URI+'/movies.json?apikey='+API_KEY;
    
    $.ajax({
    type: "GET",
    url: url+"&q="+nombre,
    dataType: "jsonp",
    success: function(data) {
      
       // $("#sugerencias").html("");
       
        var arrayPelis = data.movies;
        
        if (data.total > 1)
        { //mas de un resultado...resolver cual agarrar
        }
        var i;
        for(i=0;i<data.movies.length;i++)
          {
            var peli = data.movies[i];
            var page_peli=data.movies[i].links.self;


            var id = peli.id;
            var title= peli.title;
            var anio= peli.year;
            var tiempo = peli.runtime;
            var sintesis = peli.synopsis;

            var stringFinal = "<option value="+(i+1)+">Id: "+id+", Titulo: "+title+", Año: "+anio+"</option>";
        
            $('#sugerencias').append(stringFinal);
          }
        
      //  alert(stringFinal);
        
        
    }
    
    
    
    
});
    
    
}


