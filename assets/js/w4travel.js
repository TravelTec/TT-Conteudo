jQuery(document).ready(function(){ 
 
  	jQuery(".wp-block-button__link").attr("target", "_self");
  	jQuery(".comp-shortcode__body").find('a.comp-newshortcode__item').attr("style", "display:none"); 
  	jQuery("a .arrow:contains('⇆')").parent('a').attr("style", "display:grid");

  	getDataIdAfiliate();

}); 

function getDataIdAfiliate(){
	jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "get_data_afiliate" },
        success: function( data ) {
        	var retorno = data.slice(0,-1);
        	var resposta = JSON.parse(retorno);
        	console.log('id resposta', resposta);
			
        	if(resposta.afiliatePromo == 0){
        		jQuery(".passagens-promo").hide();
        		jQuery(".seguro-promo").hide();
        	}

        	if(resposta.afiliateBooking == 0){
				jQuery(".wp-block-button__link").each(function() { 
				    if (this.href.indexOf('{IdAfBooking}') > -1) {
				        jQuery(this).attr("style", "display:none"); 
				    }
				}); 
				jQuery("a").each(function() { 
				    if (this.href.indexOf('{IdAfBooking}') > -1) {
				        jQuery(this).removeAttr("href"); 
				    }
				}); 
        	}

        }
    });
}