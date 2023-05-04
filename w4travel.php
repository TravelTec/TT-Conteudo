<?php  







	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );







/*



	Plugin Name: Voucher Tec - Conteúdo Turístico



	Plugin URI: https://github.com/TravelTec/TT-Conteudo



	GitHub Plugin URI: https://github.com/TravelTec/TT-Conteudo



	Description: Travel Tec - Conteúdo Turístico é um plugin que atualiza diariamente o blog do seu site com posts sobre temas de viagens. O resultado é um site atualizado com o que interessa para quem deseja viajar.



	Version: 2.2.3



	Author: Travel Tec



	Author URI: https://traveltec.com.br



	License: GPLv2



*/







	require dirname(__FILE__).'/gerador/gerador-de-conteudo.php';



	require dirname(__FILE__).'/cotacao/formulario-de-cotacao.php';



	require dirname(__FILE__).'/licenciamento/gerenciar-licenca.php';



	require dirname(__FILE__).'/settings.php';











	require 'plugin-update-checker-4.10/plugin-update-checker.php';







	add_action( 'admin_init', 'w4travel_update_checker_setting' );  







	function w4travel_update_checker_setting() { 







        if ( ! is_admin() || ! class_exists( 'Puc_v4_Factory' ) ) {  



            return;  



        }  







        $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker( 



            'https://github.com/TravelTec/TT-Conteudo',  



            __FILE__,  



            'TT-Conteudo'  



        );  



	



        $myUpdateChecker->setBranch('master'); 







    }







?>

