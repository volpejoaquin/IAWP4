/* 
 * JavaScript para Add Movie
 * Conexion al WebService y funciones relacionadas
 */

var API_KEY= "5mmm2qe2qr4asyqpsnv5ykqr";
var BASE_URI= "http://api.rottentomatoes.com/api/public/v1.0";

$(document).ready(function(){
    
    $("#MovieName").attr('rows','1');
    $("#MovieYear").attr('rows','1');
    $("#MovieYear").attr('rows','1');
    $("#MovieInfo").attr('rows','4');
    $("#MovieDuration").attr('rows','1');
    $("#MovieImg").attr('rows','1');
    $("#MovieAvgRating").attr('rows','1');
    $("#MovieAvgCant").attr('rows','1');
    $("#MovieTags").attr('rows','1');
    
    //CAMBIO DE LABELS ... 
   $("label[for*='MovieName']").text("Nombre"); 
   $("label[for*='MovieYear']").text("Año estreno");
   $("label[for*='MovieInfo']").text("Sinopsis");
    $("label[for*='MovieDuration']").text("Duracion (mins)");
    $("label[for*='MovieImg']").text("Imagen");
    $("label[for*='MovieAvgRating']").text("Puntaje total");
    $("label[for*='MovieAvgCant']").text("Cantidad de Votos");
    $("label[for*='MovieTags']").text("Tags (separadas por |-|)").attr('rows','1');
  
  $("label[for*='ActorName']").text("Nombre"); 
  $("label[for*='ActorBirthday']").text("Fecha de Nacimiento"); 
  $("label[for*='ActorBirthplace']").text("Lugar de Nacimiento"); 
  $("label[for*='ActorBio']").text("Biografía"); 
  $("label[for*='ActorImg']").text("Imagen");
   
  $("label[for*='WriterName']").text("Nombre"); 
  $("label[for*='WriterBirthday']").text("Fecha de Nacimiento"); 
  $("label[for*='WriterBirthplace']").text("Lugar de Nacimiento"); 
  $("label[for*='WriterBio']").text("Biografía"); 
  $("label[for*='WriterImg']").text("Imagen");
  
  $("label[for*='DirectorName']").text("Nombre"); 
  $("label[for*='DirectorBirthday']").text("Fecha de Nacimiento"); 
  $("label[for*='DirectorBirthplace']").text("Lugar de Nacimiento"); 
  $("label[for*='DirectorBio']").text("Biografía"); 
  $("label[for*='DirectorImg']").text("Imagen");
  
  $("label[for*='GenreName']").text("Nombre"); 
  
  $("label[for*='MovieMovie']").text("Películas relacionadas");
  $("label[for*='ActorActor']").text("Actores relacionados");
  $("label[for*='DirectorDirector']").text("Directores relacionados");
  $("label[for*='GenreGenre']").text("Géneros relacionados");
  $("label[for*='WriterWriter']").text("Escritores relacionados");
  $("label[for*='RMovieRMovie']").text("Películas locales relacionadas");
 //********************************************************
 
 
  var urlSug=BASE_URI+'/movies.json?apikey='+API_KEY;

  $( "#movieSearch" ).autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: urlSug,   
                                        type:"GET",
					dataType: "jsonp",
					data: {
						q: request.term,
						page: "1",	
                                                page_limit: "5"
					},
					success: function( data ) {
                                              response( $.map( data.movies, function( item ) {
							return {
								label: item.title + (item.year ? " ("+ item.year+")" : "") +(item.runtime ? " - "+item.runtime+"mins aprox." : ""),
								value: item.title,
                                                                id:item.id
							}
						}));
					}
				});
			},
			minLength: 1,
                    select: function( event, ui ) {
				                                
                                $.ajax({
					url: "http://api.rottentomatoes.com/api/public/v1.0/movies/"+ui.item.id+".json?apikey="+API_KEY,   
                                        type:"GET",
					dataType: "jsonp",
					data: {	},
					success: function( data ) {
                                              var peli = data;
                                              var title= peli.title;
                                              var poster= peli.posters.original;
                                              var thumbnail=peli.posters.detailed;
                                              var anio= peli.year;
                                              var peliUrl=peli.links.alternate;
                                              var tiempo = peli.runtime;
                                              var sintesis = peli.synopsis; 
                                              
                                              if($.trim(sintesis) == "")
                                              {
                                                    sintesis="(No info available)";
                                              }
                                                                                           
                                              $("#MovieName").text(title);
                                              $("#MovieName").val(title);
                                              $("#MovieYear").text(anio);
                                              $("#MovieYear").val(anio);
                                              $("#MovieInfo").text(sintesis);
                                              $("#MovieInfo").val(sintesis);
                                         
                                              $("#MovieDuration").text(tiempo);
                                              $("#MovieDuration").val(tiempo);
                                              $("#MovieAvgRating").text("0.0");
                                              $("#MovieAvgRating").val("0.0");
                                              $("#MovieAvgCant").val("0.0");
                                              
                                              //Poster
                                             // $("#MovieImg").text(poster);
                                              $("#MovieImg").val(poster);
                                              $("#rotten").attr('src',thumbnail);
                                              
                                              //Crear tags
                                              title = title.replace("-","");
                                              title = title.replace(",","");
                                              title = title.replace(":","");
                                              title = title.replace(";","");
                                              title = title.replace(".","");
                                              title = title.replace("?","");
                                              title = title.replace("\"","");
                                              title = title.replace("/","");
                                              var taggs=explode(' ',title);
                                              var stringTags="";
                                              for(i=0;i<taggs.length;i++)                                              
                                              {
                                                  if($.trim(taggs[i])!="")
                                                  {
                                                      stringTags+=taggs[i];
                                                      if(i != taggs.length-1)
                                                        {     
                                                            stringTags+="|-|";
                                                        }
                                                  }
                                              }
                                              $("#MovieTags").text(stringTags);
                                              
                                              
                                              //Abre la pagina correspondiente a la peli en RottenTomatoes
                                              if(peliUrl!= undefined && $.trim(peliUrl) != "")
                                              {
                                                  window.open(peliUrl);
                                              }
                                              
                                              //Borra info anterior de otras pelis
                                              $("#otherActors").remove();
                                              $("#otherDirectors").remove();
                                              $("#otherGenres").remove();
                                              //*************ACTORES*************
                                              var arrayActores= peli.abridged_cast;
                                              var j;
                                              var estan=[],noEstan=[],nombre,cast="";
                                              
                                              //Lleno los actores disponibles
                                              var optActors=[];
                                                $("#ActorActor option").each(function(i,opt){
                                                    optActors[i]=$(opt).text();
                                                });
                                              //Checkear coincidencias
                                             for(j=0;j<arrayActores.length;j++)
                                             {
                                                nombre=""+arrayActores[j].name;
                                                //Si el actor esta disponible
                                                if(optActors.indexOf(nombre)>-1)
                                                {
                                                    estan.push(nombre); 
                                                }
                                                else
                                                {
                                                    noEstan.push(nombre);
                                                }
                                              }
                                                
                                              //Selecciono los que estan disponibles
                                              for(j=0;j<estan.length;j++)
                                              {
                                                  $("#ActorActor option").each(function(i,opt){
                                                    if(estan[j]==$(opt).text())
                                                    {
                                                        $(opt).attr("selected","selected");
                                                    }
                                                });
                                              }
                                          
                                              //Sugiero los que no estan disponibles
                                              for(j=0;j<noEstan.length;j++)
                                              {
                                                  cast+=""+noEstan[j];
                                                  if(j<noEstan.length-1)
                                                  {
                                                      cast+=", "
                                                  }
                                              }
                                              
                                          //    alert(estan +"  "+ noEstan);
                                               
                                              if(noEstan.length>0) 
                                                $("#ActorActor").parent().append("<span id='otherActors'> Other Actors: "+cast+"</span>");
                                              //******************************************
                                                
                                              //**************DIRECTORES*******************
                                              var arrayDirectores= peli.abridged_directors;
                                              var estanDir=[],noEstanDir=[],dir,dirs_string="";
                                              
                                              //Lleno los directores disponibles
                                              var optDirs=[];
                                                $("#DirectorDirector option").each(function(i,opt){
                                                    optDirs[i]=$(opt).text();
                                                });
                                              //Checkear coincidencias
                                             for(j=0;j<arrayDirectores.length;j++)
                                             {
                                                dir=""+arrayDirectores[j].name;
                                                //Si el director esta disponible
                                                if(optDirs.indexOf(dir)>-1)
                                                {
                                                    estanDir.push(dir); 
                                                }
                                                else
                                                {
                                                    noEstanDir.push(dir);
                                                }
                                              }
                                                
                                              //Selecciono los que estan disponibles
                                              for(j=0;j<estanDir.length;j++)
                                              {
                                                  $("#DirectorDirector option").each(function(i,opt){
                                                    if(estanDir[j]==$(opt).text())
                                                    {
                                                        $(opt).attr("selected","selected");
                                                    }
                                                });
                                              }
                                          
                                              //Sugiero los que no estan disponibles
                                              for(j=0;j<noEstanDir.length;j++)
                                              {
                                                  dirs_string+=""+noEstanDir[j];
                                                  if(j<noEstanDir.length-1)
                                                  {
                                                      dirs_string+=", "
                                                  }
                                              }
                                              
                                            //alert("DIRS ="+estanDir +" | "+ noEstanDir);
                                                
                                              if(noEstanDir.length>0)
                                                $("#DirectorDirector").parent().append("<span id='otherDirectors'>Other Directors: "+dirs_string+"</span>");
                                              //**************************************
                                              
                                              //****************GENEROS****************
                                              var arrayGeneros= peli.genres;
                                              var estanGen=[],noEstanGen=[],gen,gens_string="";
                                              
                                              //Lleno los directores disponibles
                                              var optGens=[];
                                                $("#GenreGenre option").each(function(i,opt){
                                                    optGens[i]=$(opt).text();
                                                });
                                              //Checkear coincidencias
                                             for(j=0;j<arrayGeneros.length;j++)
                                             {
                                                gen=""+arrayGeneros[j];
                                                //Si el director esta disponible
                                                if(optGens.indexOf(gen)>-1)
                                                {
                                                    estanGen.push(gen); 
                                                }
                                                else
                                                {
                                                    noEstanGen.push(gen);
                                                }
                                              }
                                                
                                              //Selecciono los que estan disponibles
                                              for(j=0;j<estanGen.length;j++)
                                              {
                                                  $("#GenreGenre option").each(function(i,opt){
                                                    if(estanGen[j]==$(opt).text())
                                                    {
                                                        $(opt).attr("selected","selected");
                                                    }
                                                });
                                              }
                                          
                                              //Sugiero los que no estan disponibles
                                              for(j=0;j<noEstanGen.length;j++)
                                              {
                                                  gens_string+=""+noEstanGen[j];
                                                  if(j<noEstanGen.length-1)
                                                  {
                                                      gens_string+=", "
                                                  }
                                              }
                                              
                                          //    alert(estanGen +"  "+ noEstanGen);
                                              
                                              if(noEstanGen.length>0)
                                                $("#GenreGenre").parent().append("<span id='otherGenres'>Other Suggested Genres: "+gens_string+"</span>");
                                              //********************************************
                                              
                                              //**************ESCRITORES********************
                                              // NO VIENE INFO SOBRE LOS ESCRITORES !!! 
                                              //********************************************
					}
				});
					
					
			},
			
			open: function() {
				$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
			},
			close: function() {
				$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
			}
		});
  
});


    
    
function explode (delimiter, string, limit) {

    if ( arguments.length < 2 || typeof delimiter == 'undefined' || typeof string == 'undefined' ) return null;
	if ( delimiter === '' || delimiter === false || delimiter === null) return false;
	if ( typeof delimiter == 'function' || typeof delimiter == 'object' || typeof string == 'function' || typeof string == 'object'){
		return { 0: '' };
	}
	if ( delimiter === true ) delimiter = '1';
	
	// Here we go...
	delimiter += '';
	string += '';
	
	var s = string.split( delimiter );
	

	if ( typeof limit === 'undefined' ) return s;
	
	// Support for limit
	if ( limit === 0 ) limit = 1;
	
	// Positive limit
	if ( limit > 0 ){
		if ( limit >= s.length ) return s;
		return s.slice( 0, limit - 1 ).concat( [ s.slice( limit - 1 ).join( delimiter ) ] );
	}

	// Negative limit
	if ( -limit >= s.length ) return [];
	
	s.splice( s.length + limit );
	return s;
}



