<?php  



	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );



	function enqueue_scripts_w4travel() { 



		wp_enqueue_script( 'sweetalert-wp4travel', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js');

        wp_enqueue_script( 'mask-w4travel', plugin_dir_url( __FILE__ ) . 'assets/js/mask.js'); 



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



    function minhas_configuracoes_turismo_coluna1() {

     

        add_settings_section(

            'programa_turismo_coluna1',

            '<h3 class="classe-html-h"> </h3>', 

            function( $args ) {

                echo '';

            },

            'grupo_minhas_configuracoes_turismo_coluna1'

        );

     

        add_settings_field(

            'valueInfoSolePraia',

            'Sol e Praia',

            function( $args ) {

                $options = get_option( 'valueInfoSolePraia' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoSolePraia" value="109" <?= ($options == 109 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna1',

            'programa_turismo_coluna1',

            [

                'label_for' => 'valueInfoSolePraia',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoLuxo',

            'Luxo',

            function( $args ) {

                $options = get_option( 'valueInfoLuxo' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoLuxo" value="105" <?= ($options == 105 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna1',

            'programa_turismo_coluna1',

            [

                'label_for' => 'valueInfoLuxo',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoCharme',

            'Charme',

            function( $args ) {

                $options = get_option( 'valueInfoCharme' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoCharme" value="113" <?= ($options == 113 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna1',

            'programa_turismo_coluna1',

            [

                'label_for' => 'valueInfoCharme',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoLua',

            'Lua de Mel',

            function( $args ) {

                $options = get_option( 'valueInfoLua' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoLua" value="114" <?= ($options == 114 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna1',

            'programa_turismo_coluna1',

            [

                'label_for' => 'valueInfoLua',

                'class'     => 'classe-html-tr',

            ]

        ); 

     

        add_settings_field(

            'valueInfoCompras',

            'Compras',

            function( $args ) {

                $options = get_option( 'valueInfoCompras' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoCompras" value="115" <?= ($options == 115 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna1',

            'programa_turismo_coluna1',

            [

                'label_for' => 'valueInfoCompras',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoCruzeiros',

            'Cruzeiros',

            function( $args ) {

                $options = get_option( 'valueInfoCruzeiros' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoCruzeiros" value="116" <?= ($options == 116 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna1',

            'programa_turismo_coluna1',

            [

                'label_for' => 'valueInfoCruzeiros',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoGastronomico',

            'Gastronômico',

            function( $args ) {

                $options = get_option( 'valueInfoGastronomico' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoGastronomico" value="104" <?= ($options == 104 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna1',

            'programa_turismo_coluna1',

            [

                'label_for' => 'valueInfoGastronomico',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoAventura',

            'Aventura',

            function( $args ) {

                $options = get_option( 'valueInfoAventura' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoAventura" value="96" <?= ($options == 96 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna1',

            'programa_turismo_coluna1',

            [

                'label_for' => 'valueInfoAventura',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoCultural',

            'Cultural',

            function( $args ) {

                $options = get_option( 'valueInfoCultural' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoCultural" value="98" <?= ($options == 98 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna1',

            'programa_turismo_coluna1',

            [

                'label_for' => 'valueInfoCultural',

                'class'     => 'classe-html-tr',

            ]

        );

    }

    add_action( 'admin_init', 'minhas_configuracoes_turismo_coluna1' );



    function minhas_configuracoes_turismo_coluna2() {

     

        add_settings_section(

            'programa_turismo_coluna2',

            '<h3 class="classe-html-h"> </h3>', 

            function( $args ) {

                echo '';

            },

            'grupo_minhas_configuracoes_turismo_coluna2'

        );



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoSolePraia',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoLuxo',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoCharme',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoLua',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoCompras',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoCruzeiros',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoGastronomico',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoAventura',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoCultural',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        );   



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoDiversidade',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoEventos',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoEstudos',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoEsportivo',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoEcoturismo',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoNautico',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoReligioso',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoAgroturismo',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 



        register_setting(

            'grupo_minhas_configuracoes_turismo_coluna2',

            'valueInfoSaude',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 

     

        add_settings_field(

            'valueInfoDiversidade',

            'Diversidade',

            function( $args ) {

                $options = get_option( 'valueInfoDiversidade' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoDiversidade" value="99" <?= ($options == 99 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna2',

            'programa_turismo_coluna2',

            [

                'label_for' => 'valueInfoDiversidade',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoEventos',

            'Eventos',

            function( $args ) {

                $options = get_option( 'valueInfoEventos' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoEventos" value="103" <?= ($options == 103 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna2',

            'programa_turismo_coluna2',

            [

                'label_for' => 'valueInfoEventos',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoEstudos',

            'Estudos',

            function( $args ) {

                $options = get_option( 'valueInfoEstudos' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoEstudos" value="102" <?= ($options == 102 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna2',

            'programa_turismo_coluna2',

            [

                'label_for' => 'valueInfoEstudos',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoEsportivo',

            'Esportivo',

            function( $args ) {

                $options = get_option( 'valueInfoEsportivo' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoEsportivo" value="101" <?= ($options == 101 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna2',

            'programa_turismo_coluna2',

            [

                'label_for' => 'valueInfoEsportivo',

                'class'     => 'classe-html-tr',

            ]

        ); 

     

        add_settings_field(

            'valueInfoEcoturismo',

            'Ecoturismo',

            function( $args ) {

                $options = get_option( 'valueInfoEcoturismo' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoEcoturismo" value="100" <?= ($options == 100 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna2',

            'programa_turismo_coluna2',

            [

                'label_for' => 'valueInfoEcoturismo',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoNautico',

            'Náutico',

            function( $args ) {

                $options = get_option( 'valueInfoNautico' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoNautico" value="106" <?= ($options == 106 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna2',

            'programa_turismo_coluna2',

            [

                'label_for' => 'valueInfoNautico',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoReligioso',

            'Religioso',

            function( $args ) {

                $options = get_option( 'valueInfoReligioso' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoReligioso" value="107" <?= ($options == 107 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna2',

            'programa_turismo_coluna2',

            [

                'label_for' => 'valueInfoReligioso',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoAgroturismo',

            'Agroturismo',

            function( $args ) {

                $options = get_option( 'valueInfoAgroturismo' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoAgroturismo" value="95" <?= ($options == 95 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna2',

            'programa_turismo_coluna2',

            [

                'label_for' => 'valueInfoAgroturismo',

                'class'     => 'classe-html-tr',

            ]

        );

     

        add_settings_field(

            'valueInfoSaude',

            'Saúde',

            function( $args ) {

                $options = get_option( 'valueInfoSaude' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoSaude" value="108" <?= ($options == 108 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_turismo_coluna2',

            'programa_turismo_coluna2',

            [

                'label_for' => 'valueInfoSaude',

                'class'     => 'classe-html-tr',

            ]

        );

    }

    add_action( 'admin_init', 'minhas_configuracoes_turismo_coluna2' );



    function minhas_configuracoes_turismo_noticias() {

     

        add_settings_section(

            'programa_noticias',

            '<h3 class="classe-html-h"> </h3>', 

            function( $args ) {

                echo '';

            },

            'grupo_minhas_configuracoes_noticias'

        );



        register_setting(

            'grupo_minhas_configuracoes_noticias',

            'valueNoticias',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 

     

        add_settings_field(

            'valueNoticias',

            'Marque essa opção para que os posts da categoria <strong>Notícias</strong> sejam importados para o seu site',

            function( $args ) {

                $options = get_option( 'valueNoticias' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueNoticias" value="91" <?= ($options == 91 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_noticias',

            'programa_noticias',

            [

                'label_for' => 'valueNoticias',

                'class'     => 'classe-html-trx',

            ]

        ); 

    }

    add_action( 'admin_init', 'minhas_configuracoes_turismo_noticias' );



    function minhas_configuracoes_turismo_info() {

     

        add_settings_section(

            'programa_info',

            '<h3 class="classe-html-h"> </h3>', 

            function( $args ) {

                echo '';

            },

            'grupo_minhas_configuracoes_info'

        );



        register_setting(

            'grupo_minhas_configuracoes_info',

            'valueInfo',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        ); 

     

        add_settings_field(

            'valueInfo',

            'Marque essa opção para que os posts da categoria <strong>Informações</strong> sejam importados para o seu site',

            function( $args ) {

                $options = get_option( 'valueInfo' ); 

                ?>

                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfo" value="89" <?= ($options == 89 ? 'checked' : '') ?>>

                <?php

            },

            'grupo_minhas_configuracoes_info',

            'programa_info',

            [

                'label_for' => 'valueInfo',

                'class'     => 'classe-html-trx',

            ]

        ); 

    }

    add_action( 'admin_init', 'minhas_configuracoes_turismo_info' );



    function minhas_configuracoes_turismo_license() {

     

        add_settings_section(

            'programa_license',

            '<h3 class="classe-html-h"> </h3>', 

            function( $args ) {

                echo '';

            },

            'grupo_minhas_configuracoes_license'

        );



        register_setting(

            'grupo_minhas_configuracoes_license',

            'setValueLicense',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        );



        register_setting(

            'grupo_minhas_configuracoes_license',

            'setValueWhatsapp',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        );



        register_setting(

            'grupo_minhas_configuracoes_license',

            'setNumeroWhatsapp',

            array(

                'sanitize_callback' => function( $value ) {

                    return $value;

                },

            )

        );

     

        add_settings_field(

            'setValueLicense',

            '',

            function( $args ) { 

                $options = get_option( 'setValueLicense' );  

                ?> 

                    <div class="textLicense" style="margin: 8px 0;">

                        <strong>Licença</strong><br>

                        <label>Entre com a sua licença e clique no botão para validar:</label><br>

                        <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="setValueLicense" id="setValueLicense" value="<?= $options ?>" style="width:30%;margin-top: 6px" autocomplete="off">

                        <button name="" id="importData" class="button button-secondary" onclick="checkLicenseIugu()" style="position: absolute;bottom: 8px;margin-left: 9px;">Validar</button>

                    </div> 

                <?php

            },

            'grupo_minhas_configuracoes_license',

            'programa_license',

            [

                'label_for' => 'setValueLicense',

                'class'     => '',

            ]

        );

     

        add_settings_field(

            'setNumeroWhatsapp',

            '',

            function( $args ) { 

                $options = get_option( 'setNumeroWhatsapp' );  

                ?> 

                    <div class="" style="margin: 8px 0;">

                        <strong>Whatsapp</strong><br>

                        <label>Entre com o seu número de whatsapp:</label><br>

                        <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="setNumeroWhatsapp" value="<?= $options ?>" style="width:30%;margin-top: 6px" autocomplete="off"> 

                    </div> 

                <?php

            },

            'grupo_minhas_configuracoes_license',

            'programa_license',

            [

                'label_for' => 'setNumeroWhatsapp',

                'class'     => '',

            ]

        );

     

        add_settings_field(

            'setValueWhatsapp',

            '',

            function( $args ) { 

                $options = get_option( 'setValueWhatsapp' );  

                ?> 

                    <div class="" style="margin: 8px 0;"> 

                        <label>Entre com a mensagem que deseja que seja enviada:</label><br>

                        <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="setValueWhatsapp" value="<?= $options ?>" style="width:30%;margin-top: 6px" autocomplete="off"> 

                    </div> 

                <?php

            },

            'grupo_minhas_configuracoes_license',

            'programa_license',

            [

                'label_for' => 'setValueWhatsapp',

                'class'     => '',

            ]

        );

    }

    add_action( 'admin_init', 'minhas_configuracoes_turismo_license' );



    add_action('admin_menu', 'custom_menu');

    function custom_menu() { 

  add_menu_page( 

      'Conteúdo Turístico', 

      'TT - Conteúdo', 

      'edit_posts', 

      'w4travel', 

      'gerador_de_conteudo_html', 

      'dashicons-open-folder' 

     );

}

 

     

    function gerador_de_conteudo_html() {

        ?>

        <div class="wrap">

            <h1><?php echo esc_html( get_admin_page_title() ); ?> </h1> 

            

                <div id="tabs">

                    <h2 class="nav-tab-wrapper">

                        <a href="#tab-about" class="nav-tab">Sobre</a>

                        <a href="#tab-tur" class="nav-tab">Turismo</a>

                        <a href="#tab-news" class="nav-tab">Notícias</a>

                        <a href="#tab-info" class="nav-tab">Informações</a>

                        <a href="#tab-config" class="nav-tab">Configurações</a>

                    </h2>



                    <div id="tab-about" class="tab-content" style="padding: 30px 10px">

                        <img src="https://traveltec.com.br/wp-content/uploads/2021/08/Logotipo-Pequeno.png" style="height: 35px">

                        <p style="font-size:17px;line-height: 1.8"> O Plugin <strong>Travel Tec - CONTEÚDO TURÍSTICO</strong> foi desenvolvido para resolver o problema das agências de viagens em manter um conteúdo relevante para seus clientes e principalmente atrair novos clientes. </p>

			<button name="importData" id="importData" class="button button-secondary" onclick="importContentTours()">Importar todo o conteúdo</button>

                        <?php 

                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

date_default_timezone_set('America/Sao_Paulo');

                            function sortFunction( $a, $b ) {

                                return $a["date"] > $b["date"];

                            }  

 



                                $server = '162.240.67.31';

                            $user = 'blogtraveltec_wp';

                            $database = 'blogtraveltec_wp';

                            $pass = '%T^ka^1ERWix'; 



                            $connBlog = conectar_mysql_wp($server, $user, $pass, $database);  



                                                                        $data_inicio = date("2023-04-03 00:00:00");

                                                                        $data_final = date("2023-04-09 00:00:00");





                            $dateAfter = date("Y-m-d 00:00:00");

                            $dateBefore = date("Y-m-d 23:59:59");

                            $sqlPosts = $connBlog->prepare("SELECT ID, post_date, post_title, post_excerpt FROM `wp_posts` where post_date >= '".$data_inicio."' and post_date <= '".$data_final."'");

                            $sqlPosts->execute(); 

                            $retornoPosts = $sqlPosts->fetchAll(\PDO::FETCH_ASSOC);  

                        ?>



                        <!-- Latest compiled and minified CSS -->

                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



                        <!-- Optional theme -->

                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



                        <!-- Latest compiled and minified JavaScript -->

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



                        <style>

                            body{

                                background-color: #f0f0f1 !important;

                                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif !important;

                            }

                            .wp-admin p input[type=checkbox], .wp-admin p input[type=radio], td>input[type=checkbox], input[type=checkbox]:checked::before{

                                height: 15px !important;

                                width: 15px !important;

                            }

                            label{

                                font-weight: 400 !important;

                            }

                            .btn-about{

                                background-color: #FFE200 !important;

                                text-transform: uppercase !important;

                                font-weight: 700 !important;

                                color: #000 !important;

                                border: 1px solid transparent !important;

                                padding: 10px 25px !important;

                                border-radius: 50px !important;

                                background-image: none;

                            }

                            .btn-about:hover{

                                background-color: #f1d600 !important;

                            }

                            .excerpt p{

                                margin-bottom: 5px;font-size: 13px;

                            }

                            .excerpt{

                                height:172px;

                            }

                        </style>



                        <div class="container" style="width:100%">

                            <div class="row">

                                <div class="col-lg-12" style="padding-left: 0">

                                    <h4>Semana 14 - Março 2023</h4>

                                </div> 

                            </div> 

                            <div class="row">

                                <div class="col-lg-9" style="border-right: 1px solid #ddd;padding-left: 0">

                                    <div class="row">

                                        <?php for($i=0; $i<count($retornoPosts); $i++){ ?>

                                            <?php   

                                                    $postId = $retornoPosts[$i]["ID"];



                                                    $sqlPostThumbnail = $connBlog->prepare("SELECT * FROM `wp_postmeta` WHERE meta_key = '_thumbnail_id' AND post_id = ".$postId);

                                                    $sqlPostThumbnail->execute(); 

                                                    $retornoPostThumbnail = $sqlPostThumbnail->fetch(\PDO::FETCH_ASSOC);  



                                                    $id_featured_image = $retornoPostThumbnail["meta_value"]; 



                                                    $curl2 = curl_init();



                                                    curl_setopt_array($curl2, array(

                                                        CURLOPT_URL => "https://blog.traveltec.com.br/wp-json/wp/v2/media/".$id_featured_image,

                                                        CURLOPT_RETURNTRANSFER => true,

                                                        CURLOPT_ENCODING => "",

                                                        CURLOPT_MAXREDIRS => 10,

                                                        CURLOPT_TIMEOUT => 30,

                                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

                                                        CURLOPT_CUSTOMREQUEST => "GET",

                                                        CURLOPT_HTTPHEADER => array(

                                                            "cache-control: no-cache",

                                                            "postman-token: 1115aa25-da4c-19b0-49bf-f42d1a16f384"

                                                        ),

                                                    ));



                                                    $response2 = curl_exec($curl2);

                                                    $err2 = curl_error($curl2);



                                                    curl_close($curl2);



                                                    if ($err2) {

                                                        echo "cURL Error #:" . $err2;

                                                    } else {

                                                        $resposta2 = json_decode($response2);  

                                                        $post_featured_image = "";

                                                        if(!empty($resposta2) || $resposta2 != null || $resposta2 != "null"){

                                                            if(isset($resposta2->id)){

                                                                $post_featured_image = $resposta2->guid->rendered;

                                                            } 

                                                        }

                                                    }  



                                                ?>

                                                    <div class="col-lg-6" style="margin-bottom: 13px;border-bottom: 1px solid #ddd;padding-bottom: 12px;">

                                                        <h5 style="text-transform: capitalize"><?=utf8_encode(strftime('%A: %d/%m', strtotime($retornoPosts[$i]["post_date"])));?></h5>

                                                        <h5><?=$retornoPosts[$i]["post_title"]?></h5>

                                                        <div class="row">

                                                            <div class="col-lg-6">

                                                                <img src="<?=(empty($post_featured_image) ? plugin_dir_url( __FILE__ ).'assets/img/no-image.png' : $post_featured_image)?>" style="width:100%;height:150px">

                                                            </div>

                                                            <div class="col-lg-6 excerpt" style="padding-left: 5px">

                                                                <?=mb_substr($retornoPosts[$i]["post_excerpt"], 0, 195)?> [...]

                                                                <br>

                                                                <span style="font-size:12px"><strong>Categoria: </strong>Turismo Sol e Praia</span>

                                                            </div>

                                                        </div>

                                                    </div>  

                                            <?php } ?> 

                                    </div>

                                </div>

                                <div class="col-lg-3" style="">

                                    <h4>Divulgação</h4>

                                    <p>Acesse nosso Google Drive e baixe os arquivos de imagens e texto para você fazer as suas divulgações nas redes sociais, WhatsApp e Newsletters.</p>

                                    <a href="https://drive.google.com/drive/folders/1kXwT1Q7pwuOjqBOyYdUkLnI25tVV6alX" target="_blank"><button class="btn btn-warning btn-about">Baixar Arquivo</button></a>

                                    <hr>

                                    <h4>Sugestão</h4>

                                    <p>Se você gostaria de um conteúdo específico para o modelo de negócio e para o perfil do seu cliente, faça a sua sugestão de conteúdo.</p>

                                    <a href="https://traveltec.com.br/sugestao-de-conteudo/" target="_blank"><button class="btn btn-warning btn-about">Sugerir conteúdo</button></a>

                                </div> 

                            </div> 

                        </div>

                    </div>

                    <div id="tab-tur" class="tab-content" style="padding: 20px 10px">

                        <p style="font-size:17px;line-height: 1.8"> Nessa aba você definirá quais são os tipos de conteúdo que deseja que o seu site receba. Lembrando que a qualquer momento você pode alterar essa configuração.</p>

                        <p style="font-size:17px;line-height: 1.8"><i>Lembrando que ao desmarcar uma opção o plugin irá remover o conteúdo que pertence a essa categoria.</i></p>



                        <form action="options.php" method="post"> 



                            <table style="width:40%"> 

                                <tbody>

                                    <tr>

                                        <td>

                                            <?php  

                                                settings_fields( 'grupo_minhas_configuracoes_turismo_coluna1' );

                                                do_settings_sections( 'grupo_minhas_configuracoes_turismo_coluna1' ); 

                                            ?>

                                        </td>

                                        <td>

                                            <?php  

                                                settings_fields( 'grupo_minhas_configuracoes_turismo_coluna2' );

                                                do_settings_sections( 'grupo_minhas_configuracoes_turismo_coluna2' ); 

                                            ?>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>



                            <?php 

                                submit_button();

                            ?>



                        </form>



                    </div>

                    <div id="tab-news" class="tab-content" style="padding: 20px 10px">

                        <p style="font-size:17px;line-height: 1.8"> Aqui você informa ao nosso plugin que deseja receber postagens com notícias sobre o mercado de viagens.</p>



                        <form action="options.php" method="post">



                            <?php 

                                settings_fields( 'grupo_minhas_configuracoes_noticias' );  

                                do_settings_sections( 'grupo_minhas_configuracoes_noticias' );  

                                submit_button();

                            ?>



                        </form>

                    </div>

                    <div id="tab-info" class="tab-content" style="padding: 20px 10px">

                        <p style="font-size:17px;line-height: 1.8">Aqui você informa ao plugin que deseja ser atualizado com informações relevantes sobre o turismo, tais como vistos, documentação, passaporte, vacinas entre outras informações.</p>



                        <form action="options.php" method="post">



                            <?php 

                                settings_fields( 'grupo_minhas_configuracoes_info' );  

                                do_settings_sections( 'grupo_minhas_configuracoes_info' );  

                                submit_button();

                            ?>



                        </form>

                    </div>

                    <div id="tab-config" class="tab-content" style="padding: 20px 10px">

                        <p style="font-size:17px;line-height: 1.8">Nessa aba você ativa o nosso plugin colocando a licença que recebeu no ato do licenciamento.</p>



                        <p style="font-size:17px;line-height: 1.8">Após incluir a licença, o plugin irá validar a licença e iniciar a importação diária do conteúdo. Você também tem a opção de 
				o conteúdo que já está publicado na base de dados da Travel Tec.</p>



                        <p style="font-size:17px;line-height: 1.8">É também nessa ABA que você poderá incluir os dados do seu WhatsApp junto com a mensagem que deseja receber. Ao ativar essa opção o plugin irá exibir no final de todos os posts, um ícone do WhatsApp já com o seu número de telefone.</p>



                        



                        <form action="options.php" method="post">



                            <?php 

                                settings_fields( 'grupo_minhas_configuracoes_license' );  

                                do_settings_sections( 'grupo_minhas_configuracoes_license' ); 

                            ?>  



                            <p class="submit" style="position:absolute;z-index:9999"><input type="submit" name="submit" id="submit" class="button button-primary" value="Salvar alterações"></p>



                        </form>

                    </div>

                </div> 

            

        </div>

        <?php

    }



    // define the wp_mail_failed callback

    function action_wp_mail_failed_w4travel($wp_error)

    {

        return error_log(print_r($wp_error, true));

    }



    function wpse27856_set_content_type_w4travel(){

        return "text/html";

    }

    add_filter( 'wp_mail_content_type','wpse27856_set_content_type_w4travel' );



    // add the action

    add_action('wp_mail_failed', 'action_wp_mail_failed_w4travel', 10, 1);

    

    add_action( 'wp_ajax_send_mail', 'send_mail_w4travel' );

    add_action( 'wp_ajax_nopriv_send_mail', 'send_mail_w4travel' );

    function send_mail_w4travel(){

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
