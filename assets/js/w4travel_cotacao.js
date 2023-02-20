jQuery(document).ready(function(){ 

    const nxtBtn = jQuery('#submitBtn');
    const form1 = jQuery('#form1');
    const form2 = jQuery('#form2');
    const form3 = jQuery('#form3');
    const form4 = jQuery('#form4');
    const form5 = jQuery('#form5');


    const icon1 = jQuery('#icon1');
    const icon2 = jQuery('#icon2');
    const icon3 = jQuery('#icon3');
    const icon4 = jQuery('#icon4');
    const icon5 = jQuery('#icon5'); 


});

$(function () {
    $("#inputPhone").mask("(99) 99999-9999");
    $("#inputDateFrom").mask("99/99/9999");
    $("#inputDateTo").mask("99/99/9999");

    $('#inputDateFrom').datepicker({
        inline: true,
        startDate: '+1d',
        format: "dd/mm/yyyy",
        language: "pt-BR",
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#inputDateTo').datepicker('setStartDate', minDate);
    });

    $('#inputDateTo').datepicker({
        startDate: '+1d',
        format: "dd/mm/yyyy",
        language: "pt-BR",
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });

});


var viewId = 1;
function nextForm(){
    console.log("hellonext");
    viewId=viewId+1;
    progressBar();
    displayForms();
    
    console.log(viewId);

}

function prevForm(){
    console.log("helloprev");
    viewId=viewId-1;
    console.log(viewId);
    progressBar1();
    displayForms();
}
function progressBar1(){
    if(viewId===1){
        jQuery('#icon1').addClass('active');
        jQuery('#icon2').removeClass('active');
        jQuery('#icon3').removeClass('active');
        jQuery('#icon4').removeClass('active');
        jQuery('#icon5').removeClass('active');
    }
    if(viewId===2){
        jQuery('#icon1').addClass('active');
        jQuery('#icon2').addClass('active');
        jQuery('#icon3').removeClass('active');
        jQuery('#icon4').removeClass('active');
        jQuery('#icon5').removeClass('active');
    }
    if(viewId===3){
        jQuery('#icon1').addClass('active');
        jQuery('#icon2').addClass('active');
        jQuery('#icon3').addClass('active');
        jQuery('#icon4').removeClass('active');
        jQuery('#icon5').removeClass('active');
    }
    if(viewId===4){
        jQuery('#icon1').addClass('active');
        jQuery('#icon2').addClass('active');
        jQuery('#icon3').addClass('active');
        jQuery('#icon4').addClass('active');
        jQuery('#icon5').removeClass('active');
    }
    if(viewId===5){
        jQuery('#icon1').addClass('active');
        jQuery('#icon2').addClass('active');
        jQuery('#icon3').addClass('active');
        jQuery('#icon4').addClass('active');
        jQuery('#icon5').addClass('active');
    }
    if(viewId>5){
        jQuery('#icon1').addClass('active');
        jQuery('#icon2').removeClass('active');
        jQuery('#icon3').removeClass('active');
        jQuery('#icon4').removeClass('active');
        jQuery('#icon5').removeClass('active');
        
    }
}

function progressBar(){
    if(viewId===2){
        jQuery('#icon2').addClass('active');
    }
    if(viewId===3){
        jQuery('#icon3').addClass('active');
    }
    if(viewId===4){
        jQuery('#icon4').addClass('active');
    }
    if(viewId===5){
        jQuery('#icon5').addClass('active');
    } 
}

function displayForms(){
    
    if(viewId>5){
        viewId=1;
    }

    if(viewId ===1){
        form1.style.display = 'block';
        form2.style.display = 'none';
        form3.style.display = 'none';
        form4.style.display = 'none';
        form5.style.display = 'none';


    }else if(viewId === 2){
        form1.style.display = 'none';
        form2.style.display = 'block';
        form3.style.display = 'none';
        form4.style.display = 'none';
        form5.style.display = 'none';

    }else if(viewId === 3){
        form1.style.display = 'none';
        form2.style.display = 'none';
        form3.style.display = 'block';
        form4.style.display = 'none';
        form5.style.display = 'none';
    }else if(viewId === 4){
        form1.style.display = 'none';
        form2.style.display = 'none';
        form3.style.display = 'none';
        form4.style.display = 'block';
        form5.style.display = 'none';

    }else if(viewId === 5){
        form1.style.display = 'none';
        form2.style.display = 'none';
        form3.style.display = 'none';
        form4.style.display = 'none';
        form5.style.display = 'block';

    }
} 

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
}

function send_form_cotacao(){

    $("#button_send_mail").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 10px;">');
    $("#button_send_mail").attr("disabled", "disabled");
    $("#button_send_mail").prop("disabled", true);

    var inputNome = $("#inputNome").val();
    var inputEmail = $("#inputEmail").val();
    var inputPhone = $("#inputPhone").val();
    var inputFrom = $("#inputFrom").val();
    var inputTo = $("#inputTo").val();
    var inputDateFrom = $("#inputDateFrom").val();
    var inputDateTo = $("#inputDateTo").val();
    var inputAdults = $("#inputAdults").val();
    var inputChildren = $("#inputChildren").val();
    var inputMessage = $("#inputMessage").val();

    var inlinePlane = "";
    if ($("#inlinePlane").is(':checked') == true) {
        inlinePlane = $("#inlinePlane").val();
    }

    var inlineHotel = "";
    if ($("#inlineHotel").is(':checked') == true) {
        inlineHotel = $("#inlineHotel").val();
    }

    var inlineCar = "";
    if ($("#inlineCar").is(':checked') == true) {
        inlineCar = $("#inlineCar").val();
    }

    var inlineInsurance = "";
    if ($("#inlineInsurance").is(':checked') == true) {
        inlineInsurance = $("#inlineInsurance").val();
    }

    var inlineTickets = "";
    if ($("#inlineTickets").is(':checked') == true) {
        inlineTickets = $("#inlineTickets").val();
    }

    if(inputNome == ""){
        $("#button_send_mail").html('Enviar solicitação');
        $("#button_send_mail").removeAttr("disabled");
        swal({
            title: "É necessário informar o nome.",
            icon: "warning",
        }); 
    }else if(inputEmail == ""){
        $("#button_send_mail").html('Enviar solicitação');
        $("#button_send_mail").removeAttr("disabled");
        swal({
            title: "É necessário informar o e-mail.",
            icon: "warning",
        }); 
    }else if (!isValidEmailAddress(inputEmail)) {
        $("#button_send_mail").html('Enviar solicitação');
        $("#button_send_mail").removeAttr("disabled");
        swal({
            title: "É necessário informar um e-mail válido.",
            icon: "warning",
        }); 
    }else if(inputPhone == ""){
        $("#button_send_mail").html('Enviar solicitação');
        $("#button_send_mail").removeAttr("disabled");
        swal({
            title: "É necessário informar o celular.",
            icon: "warning",
        }); 
    }else if(inputFrom == ""){
        $("#button_send_mail").html('Enviar solicitação');
        $("#button_send_mail").removeAttr("disabled");
        swal({
            title: "É necessário informar o local de origem.",
            icon: "warning",
        }); 
    }else if(inputTo == ""){
        $("#button_send_mail").html('Enviar solicitação');
        $("#button_send_mail").removeAttr("disabled");
        swal({
            title: "É necessário informar o local de destino.",
            icon: "warning",
        });  
    }else if(inputDateFrom == ""){
        $("#button_send_mail").html('Enviar solicitação');
        $("#button_send_mail").removeAttr("disabled");
        swal({
            title: "É necessário informar uma data de partida.",
            icon: "warning",
        }); 
    }else if(inputDateTo == ""){
        $("#button_send_mail").html('Enviar solicitação');
        $("#button_send_mail").removeAttr("disabled");
        swal({
            title: "É necessário informar uma data de retorno.",
            icon: "warning",
        }); 
    }else if(inputAdults == ""){
        $("#button_send_mail").html('Enviar solicitação');
        $("#button_send_mail").removeAttr("disabled");
        swal({
            title: "É necessário informar a quantidade de adultos.",
            icon: "warning",
        }); 
    }else if(inputChildren == ""){
        $("#button_send_mail").html('Enviar solicitação');
        $("#button_send_mail").removeAttr("disabled");
        swal({
            title: "É necessário informar a quantidade de crianças.",
            icon: "warning",
        }); 
    }else{
        $("#button_send_mail").attr("disabled", "disabled");
        $("#button_send_mail").prop("disabled", true);

        jQuery.ajax({
            type: "POST",
            url: wp_ajax.ajaxurl,
            data: { action: "send_mail", inputNome:inputNome, inputEmail:inputEmail, inputPhone:inputPhone, inputFrom:inputFrom, inputTo:inputTo, inputDateFrom:inputDateFrom, inputDateTo:inputDateTo, inputAdults:inputAdults, inputChildren:inputChildren, inlinePlane:inlinePlane, inlineHotel:inlineHotel, inlineCar:inlineCar, inlineInsurance:inlineInsurance, inlineTickets:inlineTickets, inputMessage:inputMessage },
            success: function( data ) {
                var retorno = data.slice(0,-1);
                if(retorno == 1){
                    window.location.href = '/obrigado?pagina='+inputFrom;
                }else{
                    swal({
                        title: "Formulário não enviado",
                        text: "Sua mensagem não pode ser enviada. Tente novamente mais tarde.",
                        icon: "error"
                    }).then((value) => {
                        window.location.reload();
                    });
                }
            }
        });

    }

}