
if (window.location.hostname == "localhost") {
	var urlBase = "/"+window.location.href.split( '/' )[3]+"/";

} else {
	var urlBase = window.location.host +"/"+ window.location.href.split( '/' )[3]+"/";
}
$(document).ready(function(){


	 $("#SearchSearch").autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: urlBase+'movies/searchjson/'+request.term+'/1/5',   
					type: 'GET',
					dataType: 'json',
					success: function( data ) {
						response(formatearDatos(data));
					}
				});
			},
			minLength: 1,
			select: function( event, ui ) {
				window.location.href = '/IAWP4/'+ui.item.type+'/view/'+ui.item.id;
				
			},

			open: function() {
				$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
			},
			close: function() {
				$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
			}
		});
		
		function formatearDatos(data) {
		
			var resul = new Array();
			
			var movies = $.map( data.movies, function( item ) {
							return {
								label: item.Movie.name+ (item.Movie.year ? " ("+ item.Movie.year+")" : "") +(item.Movie.duration ? " - "+item.Movie.duration+" aprox." : ""),
								value: item.Movie.name,
								id:item.Movie.id,
								year:item.Movie.year,
								type: 'movies'
							}
						});
			
			resul = resul.concat( movies );

			var actors = $.map( data.actors, function( item ) {
							return {
								label: item.Actor.name+" - (Actor)",
								value: item.Actor.name,
								id:item.Actor.id,
								type: 'actors'	
							}
						});

			resul = resul.concat( actors );
			
			var directors = $.map( data.directors, function( item ) {
							return {
								label: item.Director.name+" - (Director)",
								value: item.Director.name,
								id:item.Director.id,
								type: 'directors'	
							}
						});

			resul = resul.concat( directors );
			
			var writers = $.map( data.writers, function( item ) {
							return {
								label: item.Writer.name+" - (Escritor)",
								value: item.Writer.name,
								id:item.Writer.id,
								type: 'writers'		
							}
						});

			resul = resul.concat( writers );
			
			
			var genres = $.map( data.genres, function( item ) {
							return {
								label: item.Genre.name+" - (Genero)",
								value: item.Genre.name,
								id:item.Gener.id,
								type: 'genres'
							}
						});
						
			
			resul = resul.concat( genres );
			
			return resul;
		}
});

