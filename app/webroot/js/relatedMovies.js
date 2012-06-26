/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * http://www.rottentomatoes.com/search/?search=wtf&sitesearch=rt
 */

$(document).ready(function(){
    
    var regexpRelated= new RegExp("(a-zA-Z:/)*(/movies\/view\/)(a-zA-Z:/)*");
    
    //Chequea que segun el path, este en /movies/view/ y no en otro lado
    if(regexpRelated.exec(window.location.pathname)!= null)
    {
                                                                                        //<img class='tomatoImg' src='/IAWP4/img/rottenT_logo.png' title='RottenTomatoes' alt='RottenTomatoes'></img>
        $("#content").find("[class*='content']").append("<div id='relatedMovies'>\n\
                                                <div class='relatedTitle'> Pel&iacute;culas relacionadas - powered by <a class='tomatoText' href='http://www.rottentomatoes.com' target='_blank' >RottenTomatoes</a></span>\n\
                                                <div id='relatedImgs'></div>\n\
                                                </div>")

        addRelated();
    }
    else
    {
        //Estoy en otra ubicacion, no se hace nada.
    }
});


function addRelated()
{
    
    var peliActual= $("#content").find("[class*='content']").find("img").attr("title");
    var urlRelated="";
    
    
    var myUrl=BASE_URI+"/movies.json?apikey="+API_KEY;
    $.ajax({
            url: myUrl,   
            type:"GET",
            dataType: "jsonp",
            data: {
                q: peliActual,
                page: "1",
                page_limit: "1"
            },
            success: function( data ) {
                
                if(data.movies.length > 0)
                    urlRelated=data.movies[0].links.similar;
                else
                    urlRelated="none";
                    //Query para buscar el URL en rottentomatoes
                    for(i=0;i<data.movies.length;i++)
                    {
                        titulo=data.movies[i].title;
                        
                        /*
                        //Si es exactamente el mismo titulo...
                        if(peliActual == titulo)
                        {
                            urlRelated=data.movies[i].links.similar;
                        }
                        else
                        {
                            urlRelated="none";
                        }*/
                           
                           
                    }
                    
                    if(urlRelated != "none")
                    {//Consulto las pelis relacionadas al URL encontrado
                        $.ajax({
                                url: urlRelated+"?apikey="+API_KEY,   
                                type:"GET",
                                dataType: "jsonp",
                                data: {
                                    limit: "4"
                                },
                                success: function(data){
                                    
                                    var relTitle,relImg,relUrl;
                                   
                                    if(data.movies.length == 0)
                                    {
                                        $("#relatedImgs").append("<span class='relatedText'>RottenTomatoes no dispone de sugerencias para \""+peliActual+"\".</span>");
                                    }
                                    
                                    for(i=0;i<data.movies.length;i++)
                                    {
                                        peli=data.movies[i];
                                        relTitle=peli.title;
                                        relUrl=peli.links.alternate;
                                        relImg=peli.posters.detailed;
                                        
                                       $("#relatedImgs").append("<a href='"+relUrl+"' target='_blank'> <img class='relatedPics' src='"+relImg+"' title='"+relTitle+"' alt='"+relTitle+"' > </img></a>");

                                    }
                                }
                        });
                    }
                    else
                    {   //Que pasa si no encuentra pelis relacionadas
                        $("#relatedImgs").append("<span class='relatedText'>¡No se encontraron sugerencias!</span>");

                    }
            },
            error: function(){
                    urlRelated="none";
            }
    });


    
    
}