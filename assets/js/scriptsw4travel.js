jQuery(document).ready(function(){ 
	var url_atual = window.location;
	if(url_atual.search == "?page=w4travel"){

		/* estilização conteúdo */
		jQuery(".elementor-shape").hide();
		jQuery(".elementor-6664").addClass('row');
		jQuery(".elementor-6664 section").addClass('col-lg-6');
		jQuery(".elementor-element-4251364").removeClass('col-lg-6');
		jQuery(".elementor-element-4251364").addClass('col-lg-12');

		jQuery(".elementor-element-12d0367 h2").attr("style", "font-size:16px; margin-bottom: 10px");
		jQuery("figure img").attr("style", "width: 180px;height: 150px;");
		/* fim estilização conteúdo */

		jQuery("h2").attr("style", "margin: 0");
		jQuery(".form-table th").attr("style", "padding: 0;width: 300px;font-weight: 400;position: absolute;margin-left: 26px;margin-top:6px;height: 30px;");
		jQuery("#tab-news .form-table th").attr("style", "padding: 0;width: 96%;font-weight: 400;position: absolute;margin-left: 26px;height: 30px;");
		jQuery("#tab-info .form-table th").attr("style", "padding: 0;width: 96%;font-weight: 400;position: absolute;margin-left: 26px;height: 30px;");
		jQuery(".form-table td").attr("style", "padding: 0;position: relative;");

		jQuery(".classe-html-tr").attr("style", "height:30px"); 

		jQuery(".submit").attr("style", "position:absolute;z-index:9999");

		jQuery("#tab-config form").attr("id", "FORMLICENCA");

		jQuery("#setNumeroWhatsapp").mask("(99) 99999-9999");

	  	// if(jQuery("#licenseIugu").val() == "0"){
	  	// 	// jQuery(".classe-html-tr").remove();
	  	// 	// jQuery("h3").remove();
	  	// 	// jQuery(".afiliadoBooking").remove();
	  	// 	// jQuery(".form-table").attr("style", "margin: 0");
	  	// 	// jQuery("#importData").remove();

	  	// 	// jQuery(".button").attr("onclick", "checkLicenseIugu()");
	  	// 	jQuery("h4").remove();
	  	// 	jQuery(".textLicense").remove();
	  	// }else{
	  	// 	jQuery("h4").remove();
	  	// 	jQuery(".textLicense").remove();
	  	// }

	  	jQuery('#tabs .tab-content').hide();
		jQuery('#tabs .tab-content:first').show();
		jQuery('.nav-tab-wrapper a:first').addClass('nav-tab-active');

		jQuery(".nav-tab-wrapper").on("click", ".nav-tab", function(e) {
  			e.preventDefault();

  			jQuery(".nav-tab").removeClass("nav-tab-active");
  			jQuery(".tab-content").hide();
  			jQuery(this).addClass("nav-tab-active");
  			jQuery(jQuery(this).attr("href")).show();
		});
	}
});

function changeValueCheckboxContent(){
	var valueCheckboxContent = 0;
	if(jQuery("#valueCheckGetContent").is(':checked') == true){
		valueCheckboxContent = 1;
		jQuery("#valueCheckGetContent").attr("checked", "checked");
		jQuery("#valueCheckGetContent").prop("checked");
	}else{
		jQuery("#valueCheckGetContent").removeAttr("checked");
	}
	jQuery("#valueCheckGetContent").val(valueCheckboxContent);
}

function changeValueAfiliadoBooking(){
	var valueAfiliadoBooking = 0;
	if(jQuery("#valueAfiliadoBooking").is(':checked') == true){
		valueAfiliadoBooking = 1;
		jQuery("#valueAfiliadoBooking").attr("checked", "checked");
		jQuery("#valueAfiliadoBooking").prop("checked");

		jQuery(".afiliadoBooking").show();
		jQuery(".afiliadoBooking").attr("style", "margin: 8px auto;");
		jQuery("#valueAfiliadoBooking").attr("style", "margin-top: 8px;");
	}else{
		jQuery("#valueAfiliadoBooking").removeAttr("checked");
		jQuery("#valueAfiliadoBooking").removeAttr("style");
		jQuery(".afiliadoBooking").hide();
		jQuery("#setValueAfiliadoBooking").val('');
	}
	jQuery("#valueAfiliadoBooking").val(valueAfiliadoBooking); 
}

function changeValueAfiliadoPromoPassagens(){
	var valueAfiliadoPromoPassagens = 0;
	if(jQuery("#valueAfiliadoPromoPassagens").is(':checked') == true){
		valueAfiliadoPromoPassagens = 1;
		jQuery("#valueAfiliadoPromoPassagens").attr("checked", "checked");
		jQuery("#valueAfiliadoPromoPassagens").prop("checked");

		jQuery(".afiliadoPromoPassagens").show();
		jQuery(".afiliadoPromoPassagens").attr("style", "margin: 8px auto;");
		jQuery("#valueAfiliadoPromoPassagens").attr("style", "margin-top: 8px;");
	}else{
		jQuery("#valueAfiliadoPromoPassagens").removeAttr("checked");
		jQuery("#valueAfiliadoPromoPassagens").removeAttr("style");
		jQuery(".afiliadoPromoPassagens").hide();
		jQuery("#setValueAfiliadoPromoPassagens").val('');
	}
	jQuery("#valueAfiliadoPromoPassagens").val(valueAfiliadoPromoPassagens);
}

function changeValueAfiliadoPromoSeguroViagem(){
	var valueAfiliadoPromoSeguroViagem = 0;
	if(jQuery("#valueAfiliadoPromoSeguroViagem").is(':checked') == true){
		valueAfiliadoPromoSeguroViagem = 1;
		jQuery("#valueAfiliadoPromoSeguroViagem").attr("checked", "checked");
		jQuery("#valueAfiliadoPromoSeguroViagem").prop("checked");

		jQuery(".afiliadoPromoSeguroViagem").show();
		jQuery(".afiliadoPromoSeguroViagem").attr("style", "margin: 8px auto;");
		jQuery("#valueAfiliadoPromoSeguroViagem").attr("style", "margin-top: 8px;");
	}else{
		jQuery("#valueAfiliadoPromoSeguroViagem").removeAttr("checked");
		jQuery("#valueAfiliadoPromoSeguroViagem").removeAttr("style");
		jQuery(".afiliadoPromoSeguroViagem").hide();
		jQuery("#setValueAfiliadoPromoSeguroViagem").val('');
	}
	jQuery("#valueAfiliadoPromoSeguroViagem").val(valueAfiliadoPromoSeguroViagem);
}

function changeValueAfiliadoViatorPasseios(){
	var valueAfiliadoViatorPasseios = 0;
	if(jQuery("#valueAfiliadoViatorPasseios").is(':checked') == true){
		valueAfiliadoViatorPasseios = 1;
		jQuery("#valueAfiliadoViatorPasseios").attr("checked", "checked");
		jQuery("#valueAfiliadoViatorPasseios").prop("checked");

		jQuery(".afiliadoViatorPasseios").show();
		jQuery(".afiliadoViatorPasseios").attr("style", "margin: 8px auto;");
		jQuery("#valueAfiliadoViatorPasseios").attr("style", "margin-top: 8px;");
	}else{
		jQuery("#valueAfiliadoViatorPasseios").removeAttr("checked");
		jQuery("#valueAfiliadoViatorPasseios").removeAttr("style");
		jQuery(".afiliadoViatorPasseios").hide();
		jQuery("#setValueAfiliadoViatorPasseios").val('');
	}
	jQuery("#valueAfiliadoViatorPasseios").val(valueAfiliadoViatorPasseios);
}

function checkLicenseIugu(){
	var eventhandler = function(e) {
   		e.preventDefault();      
	} 
	jQuery("#FORMLICENCA").bind('submit', eventhandler);

	var license = jQuery("#setValueLicense").val();

    if(license == "" || license.length < 10){

    	swal({
            title: "Licença inválida.",
	        text: 'Por favor, preencha o campo com o valor da sua licença.',
            icon: "warning",
        }); 

	}else{

	    swal({
	        title: "Verificando licença...",
	        text: 'Por favor, aguarde.',
	        buttons: false,
	        closeOnClickOutside: false, 
	        icon: "success",
	    }); 

		var license = jQuery("#setValueLicense").val();
		var urlOrigin = window.location.origin; //com https
		var urlHost = window.location.host //sem https
		jQuery.ajax({
	        type: "POST",
	        url: wp_ajax.ajaxurl,
	        data: { license:license, urlOrigin:urlOrigin, urlHost:urlHost, action: "checkLicenseIugu" },
	        success: function( data ) {
	        	var retorno = data.slice(0,-1);
				var resposta = JSON.parse(retorno);  

				jQuery('#FORMLICENCA').unbind('submit');

			    if(resposta["status"] == 0 || resposta["status"] == 2){ 
	            	swal({
	                	title: "Erro ao validar licença",
	                  	text: resposta["message"],
	                  	icon: "error" 
	                }).then((value) => {
	                	swal.close();
	                	jQuery("#setValueLicense").val('');
	        		});
	            }else{ 
	            	swal({
	                	title: "Sucesso!",
	                  	text: "Licença validada com sucesso!",
	                  	icon: "success" 
	                });;
	            }
	        }
	    });

	} 
}

function importContentDaily(){
	jQuery("#importData").attr("disabled", "disabled");
    jQuery("#importData").prop("disabled", true);
	jQuery("#importData").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height:10px;margin-right:3px;"> Importando conteúdo diário... Aguarde.');

	jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "import_content" },
        success: function( data ) {
        	var retorno = data.slice(0,-1);
			var resposta = JSON.parse(retorno);
            if(resposta["status"] == 0){
            	jQuery("#importData").html('Importar todo o conteúdo');
            	jQuery("#importData").removeAttr("disabled");
            	swal({
                	title: "Erro ao importar.",
                  	text: resposta["message"],
                  	icon: "error" 
                });
            }else{
            	jQuery("#importData").html('Conteúdo importado!');
            	swal({
                	title: "Sucesso!",
                  	text: "Conteúdo importado com sucesso. Aproveite!",
                  	icon: "success" 
                }).then((value) => {
            	jQuery("#importData").html('Importar todo o conteúdo');
            	jQuery("#importData").removeAttr("disabled");
	        		});
            }
        }
    });
}

function importContentTours(){
	jQuery("#importData").attr("disabled", "disabled");
    jQuery("#importData").prop("disabled", true);
	jQuery("#importData").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height:10px;margin-right:3px;"> Importando... Aguarde.');

	var license = jQuery("#setValueLicense").val();

	if(license == ""){
    	jQuery("#importData").html('Importar todo o conteúdo');
    	jQuery("#importData").removeAttr("disabled");
	            	
		swal({
        	title: "Erro ao importar",
          	text: "Antes de iniciar as importações, valide sua licença na aba Configurações e selecione o tipo de conteúdo que deseja.",
          	icon: "error" 
        }).then((value) => {
        	swal.close();
        	jQuery("#setValueLicense").focus();
		});
	}else{ 

		jQuery.ajax({
	        type: "POST",
	        url: wp_ajax.ajaxurl,
	        data: { action: "import_content" },
	        success: function( data ) {
	        	var retorno = data.slice(0,-1);
				var resposta = JSON.parse(retorno);
				console.log(resposta);
	            if(resposta["status"] == 0){
	            	jQuery("#importData").html('Importar todo o conteúdo');
	            	jQuery("#importData").removeAttr("disabled");
	            	swal({
	                	title: "Erro ao importar.",
	                  	text: resposta["message"],
	                  	icon: "error" 
	                });
	            }else{
	            	jQuery("#importData").html('Conteúdo importado!');
	            	swal({
	                	title: "Sucesso!",
	                  	text: "Conteúdo importado com sucesso. Aproveite!",
	                  	icon: "success" 
	                });
	            }
	        }
	    });

	}
}
