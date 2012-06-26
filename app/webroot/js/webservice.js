/* 
 * JavaScript para Add Movie
 * Conexion al WebService y funciones relacionadas
 */

var API_KEY= "5mmm2qe2qr4asyqpsnv5ykqr";
var BASE_URI= "http://api.rottentomatoes.com/api/public/v1.0";

$(document).ready(function(){
    
  $("label[for*='MovieDuration']").text("Duration (mins)");
  
  
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
                                                                id:item.id,
                                                                year:item.year
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
                                              var anio= ui.item.year;
                                              var tiempo = peli.runtime;
                                              var sintesis = peli.synopsis; 
                                              var rating = (peli.ratings.critics_score + peli.ratings.audience_score)/20
                                              
                                              $("#MovieName").text(title);
                                              $("#MovieYear").text(anio);
                                              $("#MovieInfo").text(sintesis);
                                              $("#MovieDuration").text(tiempo);
                                              $("#MovieAvgRating").text(rating);
                                              
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
                                                $("#ActorActor").parent().append("<span > Other Actors: "+cast+"</span>");
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
                                                $("#DirectorDirector").parent().append("<span>Other Directors: "+dirs_string+"</span>");
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
                                                $("#GenreGenre").parent().append("<span>Other Suggested Genres: "+gens_string+"</span>");
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


    
    



