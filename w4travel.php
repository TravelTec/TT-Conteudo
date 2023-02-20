<?php  

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
	Plugin Name: Voucher Tec - Wordpress Travel
	Plugin URI: https://traveltec.com.br
	GitHub Plugin URI: https://traveltec.com.br
	Description: Voucher Tec - Wordpress Travel transforma o Wordpress em uma plataforma especializada em atendimento para viagens, permitindo a geração de conteúdo, cotação de viagens para o cliente e um monetizador automático, fazendo seu site vender seus serviços e aproveitar a audiência.
	Version: 1.0.0
	Author: Travel Tec
	Author URI: https://traveltec.com.br
	License: GPLv2
*/

	require dirname(__FILE__).'/gerador/gerador-de-conteudo.php';
	require dirname(__FILE__).'/cotacao/formulario-de-cotacao.php';
	require dirname(__FILE__).'/settings.php';


	require 'plugin-update-checker-4.10/plugin-update-checker.php';

	add_action( 'admin_init', 'w4travel_update_checker_setting' );  

	function w4travel_update_checker_setting() { 

        if ( ! is_admin() || ! class_exists( 'Puc_v4_Factory' ) ) {  
            return;  
        }  

        $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker( 
            'https://github.com/TravelTec/w4travel',  
            __FILE__,  
            'w4travel'  
        );  
	
        $myUpdateChecker->setBranch('master'); 

    }

?>