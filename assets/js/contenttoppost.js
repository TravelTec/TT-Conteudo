jQuery(function() {
	getDataTopPosts(); 
}); 

function getDataTopPosts(){
	jQuery.ajax({ 
	    url : 'https://blog.traveltec.com.br/wp-json/wp/v2/posts?per_page=12&page=1&orderby=date&order=desc&_embed', 
	    type : 'get', 
	    success : function( resposta ) {     

	    	if(jQuery("#optionCategories").val() != undefined){
		    	var optionCategories = JSON.parse(jQuery("#optionCategories").val());

		    	var filteredResults = [];
		    	jQuery(resposta).each(function(i, item) { 
		    		if(findArrayInArrayContent(optionCategories, item.categories)){
		    			filteredResults.push(item);
		    		}
		    	});

		    	var html = ""; 
			   var htmlBanner = ""; 
			    var contador = 0;  
				
				htmlBanner += '<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">';
					htmlBanner += '<div class="carousel-indicators">';
						jQuery(filteredResults).each(function(i, item) {
							if(i < 6){
								htmlBanner += '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'+i+'" '+(i == 0 ? 'class="active" aria-current="true"' : '')+' aria-label="'+item.title.rendered+'"></button>';
							}
						});
					htmlBanner += '</div>';

					htmlBanner += '<div class="carousel-inner">';  

			 	jQuery(filteredResults).each(function(i, item) { 
			    	if(i < 6){
			 			contador++;

			    		var img = jQuery("#pluginDirURL").val()+'assets/img/no-image.png';   
			    		jQuery(item._embedded).each(function(emb, embed) { 
			    			var embbed = array_values(embed);

			    			if(item.featured_media == embbed[1][0].id){
			    				img = embbed[1][0].source_url;
			    			}
			    		});
			 
			    		html += '<div class="col-lg-4 col-md-6 col-12">';
				    		html += '<div class="card grid mb-5">';
			  					html += '<a href="/content/'+item.slug+'" style="cursor:pointer;text-decoration:none;"><img class="card-img-top" src="'+img+'" alt="'+item.title.rendered+'" style="height: 240px"></a>';
			  					html += '<div class="card-body">';
			    					html += '<a href="/content/'+item.slug+'" style="cursor:pointer;text-decoration:none;"><h5 class="card-title"><strong>'+item.title.rendered+'</strong></h5></a>';
			    					html += '<p class="card-text">'+item.excerpt.rendered.substring(0, 200)+' [...]</p>';
			    					html += '<p class="card-text"><small class="text-muted" style="font-size: 12px;">Criado em '+moment(item.date, 'YYYY-MM-DD').format("DD/MM/YYYY")+'</small></p>';
			    					html += '<a href="/content/'+item.slug+'" style="cursor:pointer;font-size: 12px;text-transform: uppercase;font-weight: 800;color: #155cda;text-decoration:none;" class="btnReadMore">Ler mais</a>';
			  					html += '</div>';
							html += '</div>';
						html += '</div>';
						
						 
								htmlBanner += '<div class="carousel-item '+(i == 0 ? 'active' : '')+'" style="background-color:#000">';
									htmlBanner += '<div class="carousel-caption d-none d-md-block">';
										htmlBanner += '<a href="https://redeturistica.com.br/'+item.slug+'/" style="color:#fff;text-decoration:none"><h5 style="line-height: 1.5;font-weight:600">'+item.title.rendered+'</h5></a>'; 
									htmlBanner += '</div>';
									htmlBanner += '<a href="https://redeturistica.com.br/'+item.slug+'/"><img src="'+img+'" class="imgBanner d-block w-100" alt="..." style=";opacity:0.4"></a>';
								htmlBanner += '</div>';
			    	}
			 	});
				
					htmlBanner += '</div>'; 
				htmlBanner += '</div>';

			 	jQuery("#resultContentTopPost").html(html); 
			 	jQuery("#bannerConteudo").html(htmlBanner); 
			 	jQuery(".buttonAllPosts").attr("style", "margin: 30px 0px;font-family: \'Montserrat\';");
		    }
	   	}
	});
}
