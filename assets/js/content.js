jQuery(function() {
	jQuery("[data-toggle='tooltip']").tooltip();  

    const searchContent = async () => { 
	  	try {   
	    	await getDataInitialContent();   
	    	await getDataAllContent();  
	  	} catch (err) { 
	    	console.error(err); 
	  	} 
	} 
	searchContent();  

	if(url_atual.indexOf("/content/") != -1){
		showPostContent();
		lisTop3Posts();

		jQuery("#phonePostContentForm").mask("(99) 99999-9999");
	}

}); 

/* HELPERS */
	function findArrayInArrayContent(array1, array2) { 
	    // Loop for array1 
	    for(let i = 0; i < array1.length; i++) { 
	        // Loop for array2 
	        for(let j = 0; j < array2.length; j++) { 
	            // Compare the element of each and 
	            // every element from both of the 
	            // arrays 
	            if(array1[i] === array2[j]) {  
	                // Return if common element found 
	                return true; 
	            } 
	        } 
	    } 
	    // Return if no common element exist 
	    return false; 
	} 

	function array_values (input) { // eslint-disable-line camelcase
	  //  discuss at: https://locutus.io/php/array_values/
	  // original by: Kevin van Zonneveld (https://kvz.io)
	  // improved by: Brett Zamir (https://brett-zamir.me)
	  //   example 1: array_values( {firstname: 'Kevin', surname: 'van Zonneveld'} )
	  //   returns 1: [ 'Kevin', 'van Zonneveld' ]
	  	const tmpArr = [];
	  	let key = '';
	  	for (key in input) {
	    	tmpArr[tmpArr.length] = input[key]
	  	}
	  	return tmpArr;
	}

	function replaceSpecialCharsContent(str) { 
	    str = str.replace(/[ÀÁÂÃÄÅ]/, "A"); 
	    str = str.replace(/[àáâãäå]/, "a"); 
	    str = str.replace(/[ÈÉÊË]/, "E"); 
	    str = str.replace(/[ÍÌ]/, "I"); 
	    str = str.replace(/[íì]/, "i"); 
	    str = str.replace(/[ÒÓÔÕ]/, "O"); 
	    str = str.replace(/[òóôõ]/, "o"); 
	    str = str.replace(/[Ú]/, "U"); 
	    str = str.replace(/[ú]/, "u"); 
	    str = str.replace(/[Ç]/, "C"); 
	    str = str.replace(/[ç]/, "c");  

	    return str; 
	} 

	function checkEmailAddress(emailAddress) { 

	    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);   
	    return pattern.test(emailAddress); 

	}
/* HELPERS */ 

function getDataAllContent(){
	jQuery.ajax({ 
	    url : 'https://redeturistica.com.br/wp-json/wp/v2/posts?per_page=100&page=1&orderby=date&order=desc&_embed', 
	    type : 'get', 
	    success : function( resposta ) {    

	    	var arrayData = resposta;
			localStorage.setItem("CONTENT_ALL_RESULT", JSON.stringify(arrayData));

			if(jQuery("#optionCategories").val() != undefined){

				var optionCategories = JSON.parse(jQuery("#optionCategories").val());

				var filteredResults = [];
				jQuery(arrayData).each(function(i, item) { 
					if(findArrayInArrayContent(optionCategories, item.categories)){
						filteredResults.push(item);
					}
				});
				localStorage.setItem("CONTENT_FILTERED_RESULT", JSON.stringify(filteredResults)); 
			}
	   	}
	});
}

function getDataInitialContent(){
	jQuery.ajax({ 
	    url : 'https://redeturistica.com.br/wp-json/wp/v2/posts?per_page=18&page=1&orderby=date&order=desc&_embed', 
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
		    	localStorage.setItem("CONTENT_FILTERED_RESULT", JSON.stringify(filteredResults));

		    	listContent(9, 0);
		    }
	   	}
	});
}

function listContent(contador_prox, contador_prev, type = null, typeFilter = null){
 	
 	if(typeFilter == 2){
 		var content = JSON.parse(localStorage.getItem("CONTENT_SEARCH_RESULT")); 
 	}else{
 		var content = JSON.parse(localStorage.getItem("CONTENT_FILTERED_RESULT")); 
 	}

 	var html = ""; 
    var contador = 0;  

 	jQuery(content).each(function(i, item) { 
    	if(i < contador_prox && i >= contador_prev){
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
    	}
 	});  

    jQuery("#totalPages").val(parseInt(parseInt(content.length)/9));

    if(contador_prev == 0){
		var page = 2;
		jQuery(".pageActiveContent").val(page);
    }else{
		var page = jQuery(".pageActiveContent").val();
		page = parseInt(page)+1;
		jQuery(".pageActiveContent").val(page);
	}

	var totalPages = jQuery("#totalPages").val();
	var pageActive = jQuery(".pageActiveContent").val();  

 	if(typeFilter == 2){ 
 		if(content.length > 9){
			jQuery(".paginationResult").removeAttr("style");
		}else{
			jQuery(".paginationResult").attr("style", "display:none"); 
		}

		if(content.length == 0){ 
			html += '<div class="col-lg-12 col-md-12 col-12" style="margin: 0;font-family: \'Montserrat\';background-color: #ffdfbf;border: 1px solid #f2cca5;border-radius: 7px;color: #000;padding: 20px;">'; 
				html += '<h4>'; 
				html += '<i class="fa fa-exclamation"></i> Não encontramos resultados para a pesquisa informada.</h4>'; 
				html += '<a onclick="listContent(9, 0)" style="color:#000081;cursor:pointer"><strong style="color:#000081;cursor:pointer">Limpar a pesquisa para ver todos os resultados.</strong></a>'; 
			html += '</div>';  
		}
	}else{
 		jQuery(".paginationResult").removeAttr("style");
 	}

    if(type == 2){
 		jQuery("#resultContent").append(html);
    }else{
 		jQuery("#resultContent").html(html); 
 	}

 	jQuery(".typeContent").val(1);

	if(parseInt(totalPages) == parseInt(pageActive)){
		jQuery("#btnLoadMore").html('Voltar ao topo'); 
		jQuery(".aLoadMore").attr('onclick', 'backToTop()'); 
	}else{
		jQuery("#btnLoadMore").html('Veja mais');
	}

} 

function listContentList(contador_prox, contador_prev, type = null, typeFilter = null){
 	 
	var content = JSON.parse(localStorage.getItem("CONTENT_FILTERED_RESULT"));  

 	var html = ""; 
    var contador = 0;  

 	jQuery(content).each(function(i, item) { 
    	if(i < contador_prox && i >= contador_prev){
 			contador++;

    		var img = jQuery("#pluginDirURL").val()+'assets/img/no-image.png';   
    		jQuery(item._embedded).each(function(emb, embed) { 
    			var embbed = array_values(embed);

    			if(item.featured_media == embbed[1][0].id){
    				img = embbed[1][0].source_url;
    			}
    		});
 
    		html += '<div class="col-lg-12 col-md-12 col-12">';
				html += '<div class="card list mb-5">';
	    			html += '<div class="row">';
						html += '<div class="col-lg-3 col-md-12 col-12">';
		  					html += '<a href="/content/'+item.slug+'" style="cursor:pointer;text-decoration:none;"><img class="card-img-top" src="'+img+'" alt="'+item.title.rendered+'" style="height: 100%"></a>';
						html += '</div>';
						html += '<div class="col-lg-9 col-md-12 col-12">';
		  					html += '<div class="card-body">';
		    					html += '<a href="/content/'+item.slug+'" style="cursor:pointer;text-decoration:none;"><h5 class="card-title"><strong>'+item.title.rendered+'</strong></h5></a>';
		    					html += '<p class="card-text">'+item.excerpt.rendered.substring(0, 200)+' [...]</p>';
		    					html += '<p class="card-text"><small class="text-muted" style="font-size: 12px;">Criado em '+moment(item.date, 'YYYY-MM-DD').format("DD/MM/YYYY")+'</small></p>';
		    					html += '<a href="/content/'+item.slug+'" style="cursor:pointer;font-size: 12px;text-transform: uppercase;font-weight: 800;color: #155cda;text-decoration:none;" class="btnReadMore">Ler mais</a>';
		  					html += '</div>'; 
						html += '</div>';
					html += '</div>';
				html += '</div>';
			html += '</div>';
    	}
 	});  

    jQuery("#totalPages").val(parseInt(parseInt(content.length)/9));

	var page = jQuery(".pageActiveContent").val();
	page = parseInt(page)+1;
	jQuery(".pageActiveContent").val(page);

	var totalPages = jQuery("#totalPages").val();
	var pageActive = jQuery(".pageActiveContent").val(); 

    if(type == 2){
 		jQuery("#resultContent").append(html);
    }else{
 		jQuery("#resultContent").html(html); 
 	}

 	jQuery(".paginationResult").removeAttr("style");

	if(parseInt(totalPages) == parseInt(pageActive)){
		jQuery("#btnLoadMore").html('Voltar ao topo'); 
		jQuery(".aLoadMore").attr('onclick', 'backToTop()'); 
	}else{
		jQuery("#btnLoadMore").html('Veja mais');
	}

} 

function loadMore(type = null){

	jQuery("#btnLoadMore").attr("disabled", "disabled");
	jQuery("#btnLoadMore").prop("disabled", true);
	jQuery("#btnLoadMore").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;">'); 

	var totalPages = jQuery("#totalPages").val();
	var pageActive = jQuery(".pageActiveContent").val();
	var page = jQuery(".pageActiveContent").val(); 

	setTimeout(function(){ 

		var contador_prox = page*9;
		var contador_prev = contador_prox-9;  

		jQuery("#btnLoadMore").removeAttr("disabled");
		jQuery("#btnLoadMore").prop("disabled", false); 

		if(jQuery(".typeContent").val() == 2){
			listContentList(contador_prox, contador_prev, 2);
		}else{
			listContent(contador_prox, contador_prev, 2);
		}

   }, 1000);

} 

function backToTop(){
	jQuery("html, body").animate({ scrollTop: 0 }, "slow"); 
}

function showViewGrid(){
	jQuery(".pageActiveContent").val(1);
	jQuery(".typeContent").val(1);
	listContent(9, 0);
}
function showViewList(){
	jQuery(".pageActiveContent").val(1);
	jQuery(".typeContent").val(2);
	listContentList(9, 0);
}

function searchPostText(){
	var searchInput = jQuery("#searchInput").val();
	if(searchInput == ""){
		swal({
            title: "É necessário informar o texto a ser pesquisado.",
            icon: "warning",
        }); 
        return false;
	}else if(searchInput.length < 3){
		swal({
            title: "É necessário informar o texto a ser pesquisado.",
            icon: "warning",
        }); 
        return false;
	}else{
		var valor_pesquisado = replaceSpecialCharsContent(searchInput.toUpperCase()); 

		var content = JSON.parse(localStorage.getItem("CONTENT_FILTERED_RESULT")); 

	 	var html = ""; 
	    var contador = 0;  
	    var filteredResults = [];

	 	jQuery(content).each(function(i, item) {
	 		var destino_pesquisar = item.title.rendered;
	 		var codigo_pesquisar = replaceSpecialChars(destino_pesquisar.toUpperCase()); 

	 		var text_destino_pesquisar = item.excerpt.rendered;
	 		var text_codigo_pesquisar = replaceSpecialChars(text_destino_pesquisar.toUpperCase()); 

	 		if(codigo_pesquisar.indexOf(valor_pesquisado) != -1 || text_codigo_pesquisar.indexOf(valor_pesquisado) != -1){
	 			filteredResults.push(item);
	 		}
	 	});

		localStorage.setItem("CONTENT_SEARCH_RESULT", JSON.stringify(filteredResults));

	 	listContent(9, 0, 1, 2);
	}
} 

/* POST CONTENT */

function showPostContent(){
	var pathname = window.location.pathname.split("/");
	var slug = pathname[2];
	var data = JSON.parse(localStorage.getItem("CONTENT_FILTERED_RESULT")); 

	var postContent = [];
	jQuery(data).each(function(i, item) {
		if(slug == item.slug){

			var img = jQuery("#pluginDirURL").val()+'assets/img/no-image.png';
    		var categories = '';   
    		jQuery(item._embedded).each(function(emb, embed) { 
    			var embbed = array_values(embed); 

    			if(item.featured_media == embbed[1][0].id){
    				img = embbed[1][0].source_url;
    			}

    			jQuery(embbed[2][0]).each(function(cat, category) { 
    				categories += category.name+', ';
    			});
    		}); 

    		var excerpt = item.excerpt.rendered; 
    		excerpt = excerpt.replace('<a href="https://redeturistica.com.br/'+slug+'/" class="" rel="bookmark">Continue a ler &raquo;<span class="screen-reader-text">'+item.title.rendered+'</span></a>', ''); 
			jQuery("#imgPostContent").attr('src', img);
			jQuery("#titlePostContent").html(item.title.rendered);
			jQuery("#titlePostContentForm").val(item.title.rendered); 

			jQuery("#datePostContent").html(moment(item.date, 'YYYY-MM-DD').format("DD/MM/YYYY"));
			jQuery("#hourPostContent").html(moment(item.date).format("hh:mm"));
			jQuery("#categoryPostContent").html(categories.slice(0, -2));

			jQuery("#postContent").html(item.content.rendered);
			jQuery("#slug_post").val(slug);
		} 
	});
}

function lisTop3Posts(){
	var content = JSON.parse(localStorage.getItem("CONTENT_FILTERED_RESULT"));  
	
	var retorno = "";

	retorno += '<h5 class="mb-3">Recentes</h5>';
	retorno += '<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">';
		retorno += '<div class="carousel-indicators">';
			jQuery(content).each(function(i, item) {
				if(i < 5){
					retorno += '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'+i+'" '+(i == 0 ? 'class="active" aria-current="true"' : '')+' aria-label="'+item.title.rendered+'"></button>';
				}
			});
		retorno += '</div>';

		retorno += '<div class="carousel-inner">';
			jQuery(content).each(function(i, item) {
				if(i < 5){

					var img = jQuery("#pluginDirURL").val()+'assets/img/no-image.png'; 
		    		jQuery(item._embedded).each(function(emb, embed) { 
		    			var embbed = array_values(embed); 

		    			if(item.featured_media == embbed[1][0].id){
		    				img = embbed[1][0].source_url;
		    			} 
		    		}); 

					retorno += '<div class="carousel-item '+(i == 0 ? 'active' : '')+'" style="background-color:#000">';
						retorno += '<a href="https://redeturistica.com.br/'+item.slug+'/"><img src="'+img+'" class="d-block w-100" alt="..." style="height:300px;opacity:0.4"></a>';
						retorno += '<div class="carousel-caption d-none d-md-block">';
							retorno += '<a href="https://redeturistica.com.br/'+item.slug+'/" style="color:#fff;text-decoration:none"><h5 style="font-size: 15px;line-height: 1.5;font-weight:600">'+item.title.rendered+'</h5></a>'; 
						retorno += '</div>';
					retorno += '</div>';
				}
			});
		retorno += '</div>';

	retorno += '</div>';

	jQuery("#carrosselTopPosts").html(retorno);
}

function sendMailContact(){
	var name    = jQuery("#nomePostContentForm").val();
	var mail    = jQuery("#mailPostContentForm").val();
	var phone   = jQuery("#phonePostContentForm").val();
	var message = jQuery("#messagePostContentForm").val();

	var post    = jQuery("#titlePostContentForm").val();
	var slug    = jQuery("#slug_post").val();

	jQuery(".btnSolicit").attr("disabled", "disabled");
	jQuery(".btnSolicit").prop("disabled", true);
	jQuery(".btnSolicit").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 18px;margin-right: 7px;"> <span style="font-size: 14px;">Validando...</span>'); 

	if(name == ""){
        jQuery(".btnSolicit").removeAttr("disabled");
		jQuery(".btnSolicit").prop("disabled", false);
		jQuery(".btnSolicit").html('Enviar solicitação'); 

		swal({
            title: "É necessário informar o nome.",
            icon: "warning",
        }); 
        return false;
	}else if(mail == ""){
        jQuery(".btnSolicit").removeAttr("disabled");
		jQuery(".btnSolicit").prop("disabled", false);
		jQuery(".btnSolicit").html('Enviar solicitação'); 

		swal({
            title: "É necessário informar o e-mail.",
            icon: "warning",
        }); 
        return false;
	}else if(!(checkEmailAddress(mail))){
        jQuery(".btnSolicit").removeAttr("disabled");
		jQuery(".btnSolicit").prop("disabled", false);
		jQuery(".btnSolicit").html('Enviar solicitação'); 

		swal({
            title: "É necessário informar um e-mail válido.",
            icon: "warning",
        }); 
        return false;
	}else if(phone == ""){
        jQuery(".btnSolicit").removeAttr("disabled");
		jQuery(".btnSolicit").prop("disabled", false);
		jQuery(".btnSolicit").html('Enviar solicitação'); 

		swal({
            title: "É necessário informar o telefone.",
            icon: "warning",
        }); 
        return false;
	}else if(phone.length < 14){
        jQuery(".btnSolicit").removeAttr("disabled");
		jQuery(".btnSolicit").prop("disabled", false);
		jQuery(".btnSolicit").html('Enviar solicitação'); 

		swal({
            title: "É necessário informar um número de telefone válido.",
            icon: "warning",
        }); 
        return false;
	}else{
		jQuery(".btnSolicit").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 18px;margin-right: 7px;"> <span style="font-size: 14px;">Enviando...</span>'); 

		jQuery.ajax({ 
        	url : jQuery("#url_ajax").val(), 
        	type : 'post',  
        	data : { 'action': 'send_mail_w4travel', name:name, mail:mail, phone:phone, message:message, post:post, slug:slug },  
        	success : function( resposta ) {
        		jQuery("#nomePostContentForm").val('');
				jQuery("#mailPostContentForm").val('');
				jQuery("#phonePostContentForm").val('');
				jQuery("#messagePostContentForm").val('');

		        jQuery(".btnSolicit").removeAttr("disabled");
				jQuery(".btnSolicit").prop("disabled", false);
				jQuery(".btnSolicit").html('Enviar solicitação'); 

        		if(parseInt(resposta.slice(0, -1)) == 2){
        			swal({
			            title: "Mensagem não enviada",
			            text: 'Entre em contato com a gente.',
			            icon: "error",
			        }); 
        		}else{
        			swal({
			            title: "Mensagem enviada com sucesso!", 
			            icon: "success",
			        }); 
        		}
        	} 
    	});
	}



}