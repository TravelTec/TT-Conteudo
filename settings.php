<?php  

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	function enqueue_scripts_w4travel() { 

		wp_enqueue_script( 'sweetalert-wp4travel', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js');

        wp_enqueue_script( 
            'scripts_w4travel',
            plugin_dir_url( __FILE__ ) . 'assets/js/scriptsw4travel.js?v='.date("dmYHis"),
            array( 'jquery' )
        ); 

        wp_localize_script( 
            'scripts_w4travel',
            'wp_ajax',
            array( 
                'ajaxurl' => admin_url( 'admin-ajax.php' ) 
            )                 
        );

    } 
	add_action( 'admin_enqueue_scripts', 'enqueue_scripts_w4travel' ); 

    function enqueue_scripts_site_w4travel() {

        wp_enqueue_style( 
            'bootstrap', 
            'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
        );

        wp_enqueue_style( 
            'w4travel_awesome', 
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'
        );  

        wp_enqueue_style( 
            'import_w4travel', 
            plugin_dir_url( __FILE__ ) . 'assets/css/import.css?v='.date("dmYHis")
        );  

        wp_enqueue_style( 
            'cotacao_w4travel', 
            plugin_dir_url( __FILE__ ) . 'assets/css/shortcode.css?v='.date("YmdHis")
        );  

        wp_enqueue_style(
            'datepicker-w4travel',
            'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css'
        );

        wp_enqueue_script( 'sweetalert-w4travel', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js');

        wp_enqueue_script( 'jquery-w4travel', "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js");
        wp_enqueue_script( 'mask-w4travel', plugin_dir_url( __FILE__ ) . 'assets/js/mask.js'); 

        wp_enqueue_script( 'datepicker-js-w4travel', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js' );
        wp_enqueue_script( 'datepicker-js-language-w4travel', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js' ); 

        wp_enqueue_script( 
            'w4travel',
            plugin_dir_url( __FILE__ ) . 'assets/js/w4travel.js?v='.date("dmYHis"),
            array( 'jquery' )
        ); 

        wp_enqueue_script( 
            'w4travel_cotacao',
            plugin_dir_url( __FILE__ ) . 'assets/js/w4travel_cotacao.js?v='.date("dmYHis"),
            array( 'jquery' )
        ); 

        wp_localize_script( 
            'w4travel',
            'wp_ajax',
            array( 
                'ajaxurl' => admin_url( 'admin-ajax.php' ) 
            )                 
        );

    }
	add_action( 'wp_enqueue_scripts', 'enqueue_scripts_site_w4travel' );  

    function minhas_configuracoes() {
        register_setting(
            'grupo_minhas_configuracoes',
            'valueCheckGetContent',
            array(
                'sanitize_callback' => function( $value ) {
                    return $value;
                },
            )
        );
        register_setting(
            'grupo_minhas_configuracoes',
            'valueAfiliadoBooking',
            array(
                'sanitize_callback' => function( $value ) {
                    return $value;
                },
            )
        );
        register_setting(
            'grupo_minhas_configuracoes',
            'setValueAfiliadoBooking',
            array(
                'sanitize_callback' => function( $value ) {
                    return $value;
                },
            )
        );
        register_setting(
            'grupo_minhas_configuracoes',
            'valueAfiliadoPromoPassagens',
            array(
                'sanitize_callback' => function( $value ) {
                    return $value;
                },
            )
        );
        register_setting(
            'grupo_minhas_configuracoes',
            'setValueAfiliadoPromoPassagens',
            array(
                'sanitize_callback' => function( $value ) {
                    return $value;
                },
            )
        );
        register_setting(
            'grupo_minhas_configuracoes',
            'valueAfiliadoPromoSeguroViagem',
            array(
                'sanitize_callback' => function( $value ) {
                    return $value;
                },
            )
        );
        register_setting(
            'grupo_minhas_configuracoes',
            'setValueAfiliadoPromoSeguroViagem',
            array(
                'sanitize_callback' => function( $value ) {
                    return $value;
                },
            )
        );
        register_setting(
            'grupo_minhas_configuracoes',
            'valueAfiliadoViatorPasseios',
            array(
                'sanitize_callback' => function( $value ) {
                    return $value;
                },
            )
        );
        register_setting(
            'grupo_minhas_configuracoes',
            'setValueAfiliadoViatorPasseios',
            array(
                'sanitize_callback' => function( $value ) {
                    return $value;
                },
            )
        );
     
        add_settings_section(
            'gerador_de_conteudo',
            'Gerador de Conteúdo', 
            function( $args ) {
                echo '';
            },
            'grupo_minhas_configuracoes'
        );
     
        add_settings_section(
            'programa_de_afiliados',
            '<br> Programa de Afiliados', 
            function( $args ) {
                echo '';
            },
            'grupo_minhas_configuracoes'
        );
     
        add_settings_field(
            'valueCheckGetContent',
            'Gerar conteúdo turístico automaticamente',
            function( $args ) {
                $options = get_option( 'valueCheckGetContent' ); 
                ?>
                <input
                    type="checkbox"
                    id="<?php echo esc_attr( $args['label_for'] ); ?>"
                    name="valueCheckGetContent"
                    onclick="changeValueCheckboxContent()"
                    value="<?= $options ?>"
                    <?= ($options == 1 ? 'checked' : '') ?>>
                <?php
            },
            'grupo_minhas_configuracoes',
            'gerador_de_conteudo',
            [
                'label_for' => 'valueCheckGetContent',
                'class'     => 'classe-html-tr',
            ]
        );
     
        add_settings_field(
            'valueAfiliadoBooking',
            'Booking - Hotéis',
            function( $args ) {
                $options = get_option( 'valueAfiliadoBooking' ); 
                ?>
                <input
                    type="checkbox"
                    id="<?php echo esc_attr( $args['label_for'] ); ?>"
                    name="valueAfiliadoBooking"
                    onclick="changeValueAfiliadoBooking()"
                    value="<?= $options ?>"
                    <?= ($options == 1 ? 'checked' : '') ?>>
                <?php
            },
            'grupo_minhas_configuracoes',
            'programa_de_afiliados',
            [
                'label_for' => 'valueAfiliadoBooking',
                'class'     => 'classe-html-tr',
            ]
        );
     
        add_settings_field(
            'setValueAfiliadoBooking',
            '',
            function( $args ) { 
                $options = get_option( 'setValueAfiliadoBooking' ); 
                ?> 
                    <div class="textAfiliado afiliadoBooking" style="<?= (!empty(trim($options)) ? 'margin: 8px auto;' : 'display:none;'); ?>">
                        <label>Informe o ID de afiliado Booking:</label>
                        <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="setValueAfiliadoBooking" value="<?php echo get_option( 'setValueAfiliadoBooking' ); ?>">
                    </div>
                <?php
            },
            'grupo_minhas_configuracoes',
            'programa_de_afiliados',
            [
                'label_for' => 'setValueAfiliadoBooking',
                'class'     => 'afiliadoBooking',
            ]
        );
     
        add_settings_field(
            'valueAfiliadoPromoPassagens',
            'Promo - Passagens Aéreas',
            function( $args ) {
                $options = get_option( 'valueAfiliadoPromoPassagens' ); 
                ?>
                <input
                    type="checkbox"
                    id="<?php echo esc_attr( $args['label_for'] ); ?>"
                    name="valueAfiliadoPromoPassagens"
                    onclick="changeValueAfiliadoPromoPassagens()"
                    value="<?= $options ?>"
                    <?= ($options == 1 ? 'checked' : '') ?>>
                <?php
            },
            'grupo_minhas_configuracoes',
            'programa_de_afiliados',
            [
                'label_for' => 'valueAfiliadoPromoPassagens',
                'class'     => 'classe-html-tr',
            ]
        );
     
        add_settings_field(
            'setValueAfiliadoPromoPassagens',
            '',
            function( $args ) { 
                $options = get_option( 'setValueAfiliadoPromoPassagens' ); 
                ?> 
                    <div class="textAfiliado afiliadoPromoPassagens" style="<?= (!empty(trim($options)) ? 'margin: 8px auto;' : 'display:none;'); ?>">
                        <label>Informe o ID de afiliado Promo:</label>
                        <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="setValueAfiliadoPromoPassagens" value="<?php echo get_option( 'setValueAfiliadoPromoPassagens' ); ?>">
                    </div>
                <?php
            },
            'grupo_minhas_configuracoes',
            'programa_de_afiliados',
            [
                'label_for' => 'setValueAfiliadoPromoPassagens',
                'class'     => 'afiliadoBooking',
            ]
        );
     
        add_settings_field(
            'valueAfiliadoPromoSeguroViagem',
            'Promo - Seguro Viagem',
            function( $args ) {
                $options = get_option( 'valueAfiliadoPromoSeguroViagem' ); 
                ?>
                <input
                    type="checkbox"
                    id="<?php echo esc_attr( $args['label_for'] ); ?>"
                    name="valueAfiliadoPromoSeguroViagem"
                    onclick="changeValueAfiliadoPromoSeguroViagem()"
                    value="<?= $options ?>"
                    <?= ($options == 1 ? 'checked' : '') ?>>
                <?php
            },
            'grupo_minhas_configuracoes',
            'programa_de_afiliados',
            [
                'label_for' => 'valueAfiliadoPromoSeguroViagem',
                'class'     => 'classe-html-tr',
            ]
        );
     
        add_settings_field(
            'setValueAfiliadoPromoSeguroViagem',
            '',
            function( $args ) { 
                $options = get_option( 'setValueAfiliadoPromoSeguroViagem' ); 
                ?> 
                    <div class="textAfiliado afiliadoPromoSeguroViagem" style="<?= (!empty(trim($options)) ? 'margin: 8px auto;' : 'display:none;'); ?>">
                        <label>Informe o ID de afiliado Promo:</label>
                        <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="setValueAfiliadoPromoSeguroViagem" value="<?php echo get_option( 'setValueAfiliadoPromoSeguroViagem' ); ?>">
                    </div>
                <?php
            },
            'grupo_minhas_configuracoes',
            'programa_de_afiliados',
            [
                'label_for' => 'setValueAfiliadoPromoSeguroViagem',
                'class'     => 'afiliadoBooking',
            ]
        );
     
        add_settings_field(
            'valueAfiliadoViatorPasseios',
            'Viator - Passeios',
            function( $args ) {
                $options = get_option( 'valueAfiliadoViatorPasseios' ); 
                ?>
                <input
                    type="checkbox"
                    id="<?php echo esc_attr( $args['label_for'] ); ?>"
                    name="valueAfiliadoViatorPasseios"
                    onclick="changeValueAfiliadoViatorPasseios()"
                    value="<?= $options ?>"
                    <?= ($options == 1 ? 'checked' : '') ?>>
                <?php
            },
            'grupo_minhas_configuracoes',
            'programa_de_afiliados',
            [
                'label_for' => 'valueAfiliadoViatorPasseios',
                'class'     => 'classe-html-tr',
            ]
        );
     
        add_settings_field(
            'setValueAfiliadoViatorPasseios',
            '',
            function( $args ) { 
                $options = get_option( 'setValueAfiliadoViatorPasseios' ); 
                ?> 
                    <div class="textAfiliado afiliadoViatorPasseios" style="<?= (!empty(trim($options)) ? 'margin: 8px auto;' : 'display:none;'); ?>">
                        <label>Informe o ID de afiliado Promo:</label>
                        <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="setValueAfiliadoViatorPasseios" value="<?php echo get_option( 'setValueAfiliadoViatorPasseios' ); ?>">
                    </div>
                <?php
            },
            'grupo_minhas_configuracoes',
            'programa_de_afiliados',
            [
                'label_for' => 'setValueAfiliadoViatorPasseios',
                'class'     => 'afiliadoBooking',
            ]
        );
    }
    add_action( 'admin_init', 'minhas_configuracoes' );

    function gerador_de_conteudo_menu() {
        add_options_page(
            'Wordpress Travel', // Título da página
            'Wordpress Travel', // Nome no menu do Painel
            'manage_options', // Permissões necessárias
            'w4travel', // Valor do parâmetro "page" no URL
            'gerador_de_conteudo_html' // Função que imprime o conteúdo da página
        );
    }
    add_action( 'admin_menu', 'gerador_de_conteudo_menu' );
     
    function gerador_de_conteudo_html() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?> <button name="importData" id="importData" class="button button-secondary" onclick="importContentTours()">Importar todo o conteúdo</button></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields( 'grupo_minhas_configuracoes' );
                do_settings_sections( 'grupo_minhas_configuracoes' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    // define the wp_mail_failed callback
    function action_wp_mail_failed($wp_error)
    {
        return error_log(print_r($wp_error, true));
    }

    function wpse27856_set_content_type(){
        return "text/html";
    }
    add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

    // add the action
    add_action('wp_mail_failed', 'action_wp_mail_failed', 10, 1);
    
    add_action( 'wp_ajax_send_mail', 'send_mail' );
    add_action( 'wp_ajax_nopriv_send_mail', 'send_mail' );
    function send_mail(){
        $mensagem = "";

        $mensagem .= "<div style='font-family:\"Montserrat\";font-size: 14px;line-height: 2;'>";
            $mensagem .= '<img src="'.(!empty(esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] )) ? esc_url(wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0]) : 'https://redeturistica.com.br/wp-content/uploads/2023/01/imagem_2023-01-11_161338374-removebg-preview.png').'" style="height: 44px"> <br><br>';
            $mensagem .= '<strong>Nome:</strong> '.$_POST['inputNome'].' <br>';
            $mensagem .= '<strong>E-mail:</strong> '.$_POST['inputEmail'].' <br>';
            $mensagem .= '<strong>Celular:</strong> '.$_POST['inputPhone'].' <br>';
            $mensagem .= '<strong>Origem:</strong> '.$_POST['inputFrom'].', '.$_POST['inputDateFrom'].' <br>';
            $mensagem .= '<strong>Destino:</strong> '.$_POST['inputTo'].', '.$_POST['inputDateTo'].' <br>';
            $mensagem .= '<strong>Qtd. adultos:</strong> '.$_POST['inputAdults'].' <br>';
            $mensagem .= '<strong>Qtd. crianças:</strong> '.$_POST['inputChildren'].' <br>';

            if(!empty($_POST['inlinePlane'])){
                $mensagem .= '<strong>Serviço adicional:</strong> Passagens Aéreas<br>';
            }
            if(!empty($_POST['inlineHotel'])){
                $mensagem .= '<strong>Serviço adicional:</strong> Hospedagem<br>';
            }
            if(!empty($_POST['inlineCar'])){
                $mensagem .= '<strong>Serviço adicional:</strong> Locação de Veículos<br>';
            }
            if(!empty($_POST['inlineInsurance'])){
                $mensagem .= '<strong>Serviço adicional:</strong> Seguro Viagem<br>';
            }
            if(!empty($_POST['inlineTickets'])){
                $mensagem .= '<strong>Serviço adicional:</strong> Ingressos<br>';
            }
            if(!empty($_POST['inputMessage'])){
                $mensagem .= '<strong>Mensagem:</strong> '.$_POST['inputMessage'].'<br>';
            }
        $mensagem .= '</div>';

        $headers = "From: Rede Turística <sac@traveltec.com.br>";
        $admin_email = get_option( 'admin_email' );
        if(wp_mail( $admin_email, "Cotação de Viagens - Nova solicitação!", $mensagem, $headers )){
            echo 1;
        }else{
            echo 2;
        }
    }

    /* AGENDA O CRON PARA A CADA 5 MINUTOS 
    * Verifica se tem algo agendado
    * Se não, faz o agendamento
    */ 
    $options = get_option( 'valueCheckGetContent' ); 
    if($options == 1){
        if (!wp_next_scheduled('wp4travel_import_content')) { 
            wp_schedule_event( strtotime('02:00:00'), 'daily', 'wp4travel_import_content' ); 
        }
        add_action( 'wp4travel_import_content', 'import_content' ); 
    }else{
        wp_clear_scheduled_hook('wp4travel_import_content');
    }

?>