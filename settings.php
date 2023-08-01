<?php  


 


	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	require 'assets/php/mail/Mail.php';







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



        wp_localize_script( 



            'w4travel',



            'wp_ajax',



            array( 



                'ajaxurl' => admin_url( 'admin-ajax.php' ) 



            )                 



        );







    }



	//add_action( 'wp_enqueue_scripts', 'enqueue_scripts_site_w4travel' );   







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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoSolePraia" value="109" onclick="addCategoria('valueInfoSolePraia', 109)" <?= ($options == 109 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoLuxo" value="105" onclick="addCategoria('valueInfoLuxo', 105)" <?= ($options == 105 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoCharme" value="113" onclick="addCategoria('valueInfoCharme', 113)" <?= ($options == 113 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoLua" value="114" onclick="addCategoria('valueInfoLua', 114)" <?= ($options == 114 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoCompras" value="115" onclick="addCategoria('valueInfoCompras', 115)" <?= ($options == 115 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoCruzeiros" value="116" onclick="addCategoria('valueInfoCruzeiros', 116)" <?= ($options == 116 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoGastronomico" value="104" onclick="addCategoria('valueInfoGastronomico', 104)" <?= ($options == 104 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoAventura" value="96" onclick="addCategoria('valueInfoAventura', 96)" <?= ($options == 96 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoCultural" value="98" onclick="addCategoria('valueInfoCultural', 98)" <?= ($options == 98 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoDiversidade" onclick="addCategoria('valueInfoDiversidade', 99)" value="99" <?= ($options == 99 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoEventos" onclick="addCategoria('valueInfoEventos', 103)" value="103" <?= ($options == 103 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoEstudos" onclick="addCategoria('valueInfoEstudos', 102)" value="102" <?= ($options == 102 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoEsportivo" value="101" onclick="addCategoria('valueInfoEsportivo', 101)" <?= ($options == 101 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoEcoturismo" value="100" onclick="addCategoria('valueInfoEcoturismo', 100)" <?= ($options == 100 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoNautico" value="106" onclick="addCategoria('valueInfoNautico', 106)" <?= ($options == 106 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoReligioso" value="107" onclick="addCategoria('valueInfoReligioso', 107)" <?= ($options == 107 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoAgroturismo" value="95" onclick="addCategoria('valueInfoAgroturismo', 95)" <?= ($options == 95 ? 'checked' : '') ?>>



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



                <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="valueInfoSaude" value="108" onclick="addCategoria('valueInfoSaude', 108)" <?= ($options == 108 ? 'checked' : '') ?>>



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


        add_settings_section(



            'programa_license',



            '<h3 class="classe-html-h"> </h3>', 



            function( $args ) {



                echo '';



            },



            'grupo_minhas_configuracoes_whatsapp_license'



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



            'grupo_minhas_configuracoes_whatsapp_license',



            'setValueWhatsapp',



            array(



                'sanitize_callback' => function( $value ) {



                    return $value;



                },



            )



        );







        register_setting(



            'grupo_minhas_configuracoes_whatsapp_license',



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



                    <div class="textLicense" style="">



                        <strong>Licença</strong><br>



                        <label style="margin-top: 15px;margin-bottom: 5px;">Entre com a sua licença e clique no botão para validar:</label><br>



                        <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="setValueLicense" id="setValueLicense" value="<?= $options ?>" style="width: 70%;margin-top: 6px;padding: 0 8px;line-height: 2;min-height: 40px;box-shadow: 0 0 0 transparent;border-radius: 0!important;border: 1px solid #e2e2e2!important;background-color: #fff;color: #2c3338;" autocomplete="off">



                        <button name="" id="importData" class="button button-secondary" onclick="checkLicenseIugu()" style="position: absolute;bottom: 0px;margin-left: 9px;height: 40px;width: 25%;">Validar</button>



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



                    <div class="" style="margin: 0;">



                        <strong>Whatsapp</strong><br>



                        <label style="margin-top: 15px;margin-bottom: 5px;">Entre com o seu número de whatsapp:</label><br>



                        <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="setNumeroWhatsapp" value="<?= $options ?>" style="width: 70%;margin-top: 6px;padding: 0 8px;line-height: 2;min-height: 40px;box-shadow: 0 0 0 transparent;border-radius: 0!important;border: 1px solid #e2e2e2!important;background-color: #fff;color: #2c3338;" autocomplete="off"> 



                    </div> 



                <?php



            },



            'grupo_minhas_configuracoes_whatsapp_license',



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



                        <label style="margin-top: 15px;margin-bottom: 5px;">Entre com a mensagem que deseja que seja enviada:</label><br>



                        <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="setValueWhatsapp" value="<?= $options ?>" style="width: 100%;margin-top: 6px;padding: 0 8px;line-height: 2;min-height: 40px;box-shadow: 0 0 0 transparent;border-radius: 0!important;border: 1px solid #e2e2e2!important;background-color: #fff;color: #2c3338;" autocomplete="off"> 



                    </div> 



                <?php



            },



            'grupo_minhas_configuracoes_whatsapp_license',



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



      'dashicons-media-text' 



     );



}



 



     



    function gerador_de_conteudo_html() { 

    		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');  
			date_default_timezone_set('America/Sao_Paulo');

    	?>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?ver=1.0">

        <style>
        	#wpcontent{
        		background-color: #f0f0f0;
        		padding: 0;
    			font-family: 'Montserrat';
        	}
        	#wpfooter{
        		display: none;
        	}
        	.header{
        		padding: 25px 30px;
        	}
        	.content{
        		padding: 25px 0;
        	}
        	.content{
        		min-height: 200px;
        	}
        	.footer{
    			padding: 20px; 
    			background-color: #fff;
    			position: absolute;
    			bottom: 0;
    			width: 100%;
        	}
        	.header h2{
        		font-size: 36px;
    			font-weight: 400;
    			font-family: 'Montserrat';
        	}
        	.header p{
        		font-family: 'Montserrat';
        		font-size: 14px;
        		margin-bottom: 0;
        	}
        	.footer p{ 
			    font-family: 'Montserrat';
			    font-size: 11px; 
        	}
        	.footer p.copyright, .footer p.links{
        		margin-bottom: 7px; 
        	}
        	.footer p.redes{
        		margin-bottom: 0px; 
        	}
        	.footer p.links .divisor{
        		font-weight: 600;
    			color: #858585;
    			margin: 0px 4px;
        	}
        	.footer p.copyright{ 
			    font-weight: 600;
			    color: #858585;
        	}
        	.footer p.redes i{
        		font-size: 16px;
    			color: #858585;
    			margin-right: 4px;
        	}

        	.nav-item{
        		margin-bottom: -1px;
        	}
        	.nav-link{
        		border: none;
			    padding: 12px 25px;
			    font-size: 14px;
			    font-weight: 600;
			    font-family: Montserrat;
        	}
        	.nav-tabs{
        		border: none;
        		padding: 0px 30px;
        	}
        	.nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover, .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
        		border: 0;
        	}
        	.tab-content{
        		padding: 45px 30px;
        		background-color: #fff;
        	}

        	.copy-button {
			    height: 36px;
			    margin-left: -4px;
			    margin-top: -2px;
			    border-radius: 0px 5px 5px 0px;
			    margin-right: 5px;
			}

			.tip {
			    background-color: #263646;
			    padding: 0 14px;
			    line-height: 27px;
			    position: absolute;
			    border-radius: 4px;
			    z-index: 100;
			    color: #fff;
			    font-size: 12px;
			    animation-name: tip;
			    animation-duration: .6s;
			    animation-fill-mode: both
			}

			.tip:before {
			    content: "";
			    background-color: #263646;
			    height: 10px;
			    width: 10px;
			    display: block;
			    position: absolute;
			    transform: rotate(45deg);
			    top: -4px;
			    left: 17px
			}

			#copied_tip {
			    animation-name: come_and_leave;
			    animation-duration: 1s;
			    animation-fill-mode: both;
			    bottom: -35px;
			    left: 2px
			}

			.text-line {
				font-weight: 600;
			    background-color: #d5d5d5;
			    padding: 8px;
			    border-radius: 5px 0px 0px 5px;
			    margin-left: 5px;
			}

			.btn-check:active+.btn-primary:focus, .btn-check:checked+.btn-primary:focus, .btn-primary.active:focus, .btn-primary:active:focus, .show>.btn-primary.dropdown-toggle:focus{
				box-shadow: none !important;
			}

			.form-label{
				font-size: 14px;
    			font-weight: 600;
			}
			.form-control{
				height: 40px;
    			border: 1px solid #e2e2e2 !important;
    			border-radius: 0 !important;
			}

			.wp-core-ui p .button{
				padding: 10px 20px;
    			font-size: 15px;
			}

			.classe-html-trx th{
				margin-top: 0px !important;
				width: 90% !important;
			}
        </style>

        <div class="header">
        	<h2><?php echo esc_html( get_admin_page_title() ); ?> </h2> 
        	<p>Atualize diariamente o blog do seu site com posts sobre temas de viagens.</p>
        </div>

        <div class="content">

	        <ul class="nav nav-tabs" id="myTab" role="tablist">
	  			<li class="nav-item" role="presentation">
	    			<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Sobre</button>
	  			</li>
	  			<li class="nav-item" role="presentation">
	    			<button class="nav-link" id="profileFlights-tab" data-bs-toggle="tab" data-bs-target="#profileFlights" type="button" role="tab" aria-controls="profileFlights" aria-selected="false">Turismo</button>
	  			</li>
	  			<li class="nav-item" role="presentation">
	    			<button class="nav-link" id="contactFlights-tab" data-bs-toggle="tab" data-bs-target="#contactFlights" type="button" role="tab" aria-controls="contactFlights" aria-selected="false">Notícias</button>
	  			</li>
	  			<li class="nav-item" role="presentation">
	    			<button class="nav-link" id="infoFlights-tab" data-bs-toggle="tab" data-bs-target="#infoFlights" type="button" role="tab" aria-controls="infoFlights" aria-selected="false">Informações</button>
	  			</li>
	  			<li class="nav-item" role="presentation">
	    			<button class="nav-link" id="configFlights-tab" data-bs-toggle="tab" data-bs-target="#configFlights" type="button" role="tab" aria-controls="configFlights" aria-selected="false">Configurações</button>
	  			</li>
			</ul>
			<div class="tab-content" id="myTabContent">
	  			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="min-height: 60px;margin-bottom:20px;"> 
	  				<img src="https://traveltec.com.br/wp-content/uploads/2021/08/Logotipo-Pequeno.png" style="height: 35px"> 

	  				<p style="font-size:17px;line-height: 1.8;margin-top: 20px;"> O Plugin <strong>Travel Tec - CONTEÚDO TURÍSTICO</strong> foi desenvolvido para resolver o problema das agências de viagens em manter um conteúdo relevante para seus clientes e principalmente atrair novos clientes. </p>

	  				<p style="font-size:17px;line-height: 1.8;margin-top: 20px;"> Para visualizar todo o conteúdo que é gerado, <a href="/conteudo-turistico">clique aqui</a> ou copie o shortcode <span class="text-line">[TTCONTEUDO_POSTS]</span> <button onclick="copyConteudo('[TTCONTEUDO_POSTS]','#copy_button_conteudo')" id="copy_button_conteudo" class="btn btn-sm btn-primary copy-button" data-toggle="tolltip" data-placement="top" tilte="Copiar shortcode">Copiar</button> na página que desejar. </p>

	  				<p style="font-size:17px;line-height: 1.8;margin-top: 20px;"> Para adicionar os primeiros resultados em uma página, copie o shortcode <span class="text-line">[TTCONTEUDO_LIST_TOP_POSTS]</span> <button onclick="copyConteudo('[TTCONTEUDO_LIST_TOP_POSTS]','#copy_button_conteudo_all')" id="copy_button_conteudo_all" class="btn btn-sm btn-primary copy-button" data-toggle="tolltip" data-placement="top" tilte="Copiar shortcode">Copiar</button> na página que desejar. </p>

	  				<?php   
						$week = date("W");
	  				?>
	  				<div class="row" style="margin-bottom: 20px;">
	  					<div class="col-lg-12">
	  						<h4> <span class="loading">Carregando</span> Semana <?=$week?> - <span class="month"><?=date("F")?></span> <?=date("Y")?>
	  					</div>
	  				</div>

	  				<div class="container"> 
	  					<div class="row">
	  						<div class="col-lg-9" style="border-right: 1px solid #ddd;padding-left: 0">
								<div class="row resultWeek">
									<img src="<?=plugin_dir_url( __FILE__ )?>assets/img/Update.gif" style="    height: 500px;width: 500px;margin: 0 auto;">
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
	  			<div class="tab-pane fade" id="profileFlights" role="tabpanel" aria-labelledby="profileFlights-tab">
	  				<p style="font-size:17px;line-height: 1.8"> Nessa aba você definirá quais são os tipos de conteúdo que deseja que o seu site receba. Lembrando que a qualquer momento você pode alterar essa configuração.</p>

	  				<p style="font-size:17px;line-height: 1.8"><i>Lembrando que ao desmarcar uma opção o plugin irá remover o conteúdo que pertence a essa categoria.</i></p>

	  				<form action="options.php" method="post" style="height: 480px;">   
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

                        <?php submit_button(); ?> 
                    </form>
	  			</div>
	  			<div class="tab-pane fade" id="contactFlights" role="tabpanel" aria-labelledby="contactFlights-tab">
	  				<p style="font-size:17px;line-height: 1.8"> Aqui você informa ao nosso plugin que deseja receber postagens com notícias sobre o mercado de viagens.</p>

	  				<form action="options.php" method="post" style="min-height: 270px;"> 

                        <?php  
                            settings_fields( 'grupo_minhas_configuracoes_noticias' );   
                            do_settings_sections( 'grupo_minhas_configuracoes_noticias' );   
                        ?> 

                        <p class="submit" style="position:absolute;z-index:9999"><input type="submit" name="submit" class="button button-primary" value="Salvar alterações"></p> 

                    </form>
	  			</div>
	  			<div class="tab-pane fade" id="infoFlights" role="tabpanel" aria-labelledby="infoFlights-tab">
	  				<p style="font-size:17px;line-height: 1.8">Aqui você informa ao plugin que deseja ser atualizado com informações relevantes sobre o turismo, tais como vistos, documentação, passaporte, vacinas entre outras informações.</p>

	  				<form action="options.php" method="post" style="min-height: 270px;"> 

                        <?php  
                            settings_fields( 'grupo_minhas_configuracoes_info' );   
                            do_settings_sections( 'grupo_minhas_configuracoes_info' );   
                            submit_button(); 
                        ?> 

                    </form>
	  			</div>
	  			<div class="tab-pane fade" id="configFlights" role="tabpanel" aria-labelledby="configFlights-tab">
	  				<p style="font-size:17px;line-height: 1.8">Nessa aba você ativa o nosso plugin colocando a licença que recebeu no ato do licenciamento.</p>  

                	<p style="font-size:17px;line-height: 1.8">É também nessa ABA que você poderá incluir os dados do seu WhatsApp junto com a mensagem que deseja receber. Ao ativar essa opção o plugin irá exibir no final de todos os posts, um ícone do WhatsApp já com o seu número de telefone.</p>

                	<form action="options.php" method="post" style="min-height: 370px;" id="FORMLICENCA"> 

                		<div class="row">

		  					<div class="col-lg-6 col-12">
		  						<ul class="nav nav-tabs" id="myTabCredencial" role="tablist" style="padding: 0px;">
						  			<li class="nav-item" role="presentation">
						    			<button class="nav-link active" id="credencial-tab" data-bs-toggle="tab" data-bs-target="#credencial" type="button" role="tab" aria-controls="home" aria-selected="true" style="border: none;background-color: #ebebeb;">Dados da licença</button>
						  			</li>
								</ul>
								<div class="tab-content" id="myTabContentCredencial" style="background-color: #ebebeb;height: 380px;">
						  			<div class="tab-pane fade show active" id="credencial" role="tabpanel" aria-labelledby="credencial-tab"> 
				                        <?php   
				                            settings_fields( 'grupo_minhas_configuracoes_license' );  
				                            do_settings_sections( 'grupo_minhas_configuracoes_license' );  
				                        ?> 

						                <p class="submit" style="position:absolute;z-index:9999"><input type="submit" name="submit" class="button button-primary" value="Salvar alterações"></p> 
				                    </div>
				                </div>
		                    </div>

		  					<div class="col-lg-6 col-12"> 
		  						<ul class="nav nav-tabs" id="myTabEstilo" role="tablist" style="padding: 0px;">
						  			<li class="nav-item" role="presentation">
						    			<button class="nav-link active" id="estilo-tab" data-bs-toggle="tab" data-bs-target="#estilo" type="button" role="tab" aria-controls="home" aria-selected="true" style="border: none;background-color: #ebebeb;">Dados de contato</button>
						  			</li> 
								</ul>
								<div class="tab-content" id="myTabContentEstilo" style="background-color: #ebebeb;height: 380px;">
						  			<div class="tab-pane fade show active" id="estilo" role="tabpanel" aria-labelledby="estilo-tab"> 
				                        <?php   
				                            settings_fields( 'grupo_minhas_configuracoes_whatsapp_license' );  
				                            do_settings_sections( 'grupo_minhas_configuracoes_whatsapp_license' );  
				                        ?>  

						                <p class="submit" style="position:absolute;z-index:9999"><input type="submit" name="submit" class="button button-primary" value="Salvar alterações"></p>
				                    </div>
				                </div>
		                    </div>

		                </div>  

                    </form>
	  			</div>
	  		</div>

	  	</div>

		<div class="footer text-center"> 
			<p class="copyright">
				<img src="https://traveltec.com.br/wp-content/uploads/2021/08/Logotipo-Pequeno.png" style="height: 20px;margin-bottom: 10px;">
				<br>
				Desenvolvido por Travel Tec © <?=date("Y")?> - Todos os direitos reservados
			</p>
			<p class="links">
				<a href="/">Suporte</a> <span class="divisor">|</span> <a href="/">Site oficial</a> <span class="divisor">|</span> <a href="/">Outros plugins</a>
			</p>
			<p class="redes">
				<i class="fa fa-instagram"></i>
				<i class="fa fa-youtube"></i>
			</p>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> 
		<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>

		<script>
			jQuery(function(){
				jQuery("[data-toggle='tooltip']").tooltip();

				jQuery("#copy_button_conteudo").attr('title', 'Copiar shortcode').tooltip('_fixTitle');
				jQuery("#copy_button_conteudo_all").attr('title', 'Copiar shortcode').tooltip('_fixTitle');
			});

			function copyConteudo(text, target) {
				navigator.clipboard.writeText(text);

				jQuery(target).attr('title', 'Copiado!').tooltip('_fixTitle').tooltip('show');

				setTimeout(function() {
					jQuery(target).attr('title', 'Copiar shortcode').tooltip('_fixTitle').tooltip('show');
				}, 800);
			}

			moment.locale('pt-br');
			jQuery(".month").html(moment().format("MMMM"));

			jQuery.ajax({

		        url : 'https://blog.traveltec.com.br/wp-json/wp/v2/posts', 
		        type : 'get', 
		        success : function( resposta ) {
		        	resposta.sort(sortResultData);

		        	var html = ""; 

		        	jQuery(resposta).each(function(i, item) { 

		        		var img = get_image_post(item.featured_media);  

		                html += '<div class="col-lg-6" style="margin-bottom: 13px;border-bottom: 1px solid #ddd;padding-bottom: 12px;">';
                            html += '<h5 style="text-transform: capitalize;font-size: 15px;font-weight: 700;">'+moment(item.date, 'YYYY-MM-DD').format("DD/MM/YYYY")+'</h5>';
                            html += '<h5 style="font-size: 19px;height: 54px;">'+item.title.rendered+'</h5>';
                            html += '<div class="row">';
                                html += '<div class="col-lg-6">';
                                    html += '<img src="'+img+'" style="width:100%;height:150px">';
                                html += '</div>';
                                html += '<div class="col-lg-6 excerpt" style="padding-left: 5px">';
                                    html += item.excerpt.rendered.substring(0, 150)+' [...]';
                                    html += '<br>';
                                    html += '<span style="font-size:12px"><strong>Categoria: </strong>Turismo Sol e Praia</span>';
                                html += '</div> ';
                            html += '</div>';
                        html += '</div>'; 

		        	}); 

		        	jQuery(".loading").attr("style", "display:none");
		        	jQuery(".resultWeek").html(html);
 
		        }

		    });

		    function sortResultData(a, b){ 
				var aID = a.id; 
			  	var bID = b.id;  
			  	return ((aID < bID) ? -1 : ((aID > bID) ? 1 : 0)); 
			}

		    function get_image_post(idImage){

		    	var img = "";

		    	jQuery.ajax({
        			url : 'https://blog.traveltec.com.br/wp-json/wp/v2/media/'+idImage, 
      				async: false,  
        			success : function( image ) { 
		        		img = image.guid.rendered;
		        	}
                });
		    	return img; 
 
		    }
		</script>
 


       
 	<?php }
	function getPageSlugContent($page_slug, $output = OBJECT, $post_type = 'page' ) { 

	  	global $wpdb; 

	   	$page = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type= %s AND post_status = 'publish'", $page_slug, $post_type ) ); 

		if ( $page ) 

	        return get_post($page, $output); 

	    return false; 

	}
	function insertPageContent($titlePost, $namePost, $contentPost){ 
		global $wpdb;
		$wpdb->insert($wpdb->posts, array(  
	        'comment_status' => 'close',  
	        'ping_status'    => 'close',  
	        'post_author'    => 1,  
	        'post_title'     => ucwords($titlePost),  
	        'post_name'      => $namePost,  
	        'post_status'    => 'publish',  
	        'post_content'   => $contentPost,  
	        'post_type'      => 'page'  
	    ));
	}

	$check_page_exist = getPageSlugContent('conteudo-turistico');   
	if(!$check_page_exist) { 
		insertPageContent('Conteúdo Turístico', 'conteudo-turistico', '[TTCONTEUDO_POSTS]');
	}

	$check_page_exist = getPageSlugContent('content');   
	if(!$check_page_exist) { 
		insertPageContent('Post - Conteúdo Turístico', 'content', '[TTCONTEUDO_POST_CONTENT]');
	}

	function get_page_id_by_title($title){
		$page = get_page_by_title($title);
		return $page->ID;
	}

	function custom_rewrite_tag() {
	  	add_rewrite_tag('%content%', '([^&]+)');
	}
	add_action('init', 'custom_rewrite_tag', 10, 0);

	function custom_rewrite_rule() {
		$pageID = get_page_id_by_title('Post - Conteúdo Turístico');
    	add_rewrite_rule('^content/([^/]*)/?','index.php?page_id='.$pageID.'&content=$matches[1]','top');
  	}
  	add_action('init', 'custom_rewrite_rule', 10, 0);




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



    



    add_action( 'wp_ajax_send_mail_w4travel', 'send_mail_w4travel' ); 
    add_action( 'wp_ajax_nopriv_send_mail_w4travel', 'send_mail_w4travel' ); 

    function send_mail_w4travel(){ 

        $mensagem = "";   

        $mensagem .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
			<html>
			  	<head>
				    <!-- Compiled with Bootstrap Email version: 1.3.1 -->
				    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				    <meta http-equiv="x-ua-compatible" content="ie=edge">
				    <meta name="x-apple-disable-message-reformatting">
				    <meta name="viewport" content="width=device-width, initial-scale=1">
				    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
				    <style type="text/css">
				      body,table,td{font-family:Helvetica,Arial,sans-serif !important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:150%}a{text-decoration:none}*{color:inherit}a[x-apple-data-detectors],u+#body a,#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}img{-ms-interpolation-mode:bicubic}table:not([class^=s-]){font-family:Helvetica,Arial,sans-serif;mso-table-lspace:0pt;mso-table-rspace:0pt;border-spacing:0px;border-collapse:collapse}table:not([class^=s-]) td{border-spacing:0px;border-collapse:collapse}@media screen and (max-width: 600px){.w-full,.w-full>tbody>tr>td{width:100% !important}.w-24,.w-24>tbody>tr>td{width:96px !important}.w-40,.w-40>tbody>tr>td{width:160px !important}.p-lg-10:not(table),.p-lg-10:not(.btn)>tbody>tr>td,.p-lg-10.btn td a{padding:0 !important}.p-3:not(table),.p-3:not(.btn)>tbody>tr>td,.p-3.btn td a{padding:12px !important}.p-6:not(table),.p-6:not(.btn)>tbody>tr>td,.p-6.btn td a{padding:24px !important}*[class*=s-lg-]>tbody>tr>td{font-size:0 !important;line-height:0 !important;height:0 !important}.s-4>tbody>tr>td{font-size:16px !important;line-height:16px !important;height:16px !important}.s-6>tbody>tr>td{font-size:24px !important;line-height:24px !important;height:24px !important}.s-10>tbody>tr>td{font-size:40px !important;line-height:40px !important;height:40px !important}}
				    </style>
			  	</head>
			  	<body class="bg-light" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#f7fafc">
			    	<table class="bg-light body" valign="top" role="presentation" border="0" cellpadding="0" cellspacing="0" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: \'Montserrat\'; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#f7fafc">
						<tbody>
					        <tr>
					          	<td valign="top" style="line-height: 24px; font-size: 16px; margin: 0;" align="left" bgcolor="#f7fafc">
					            	<table class="container" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
					              		<tbody>
					                		<tr>
					                  			<td align="center" style="line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;">
					                    			<!--[if (gte mso 9)|(IE)]>
					                      			<table align="center" role="presentation">
					                        			<tbody>
					                          				<tr>
					                            				<td width="600">
					                    			<![endif]-->
					                    			<table align="center" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 600px; margin: 0 auto;">
					                      				<tbody>
					                        				<tr>
					                          					<td style="line-height: 24px; font-size: 16px; margin: 0;" align="left">
					                            					<table class="s-10 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
					                              						<tbody>
					                                						<tr>
					                                  							<td style="line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;" align="left" width="100%" height="40"> &#160; </td>
					                                						</tr>
					                              						</tbody>
					                            					</table>
					                            					<table class="ax-center" role="presentation" align="center" border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
					                              						<tbody>
					                                						<tr>
					                                  							<td style="line-height: 24px; font-size: 16px; margin: 0;" align="left">
					                                    							<img class="w-24" src="'.(!empty(esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] )) ? esc_url(wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0]) : 'https://redeturistica.com.br/wp-content/uploads/2023/01/imagem_2023-01-11_161338374-removebg-preview.png').'" style="height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; width: 146px; border-style: none; border-width: 0;" width="96">
					                                  							</td>
					                                						</tr>
					                              						</tbody>
					                            					</table>
					                            					<table class="s-10 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
										                              	<tbody>
										                                	<tr>
										                                  		<td style="line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;" align="left" width="100%" height="40"> &#160; </td>
										                                	</tr>
										                              	</tbody>
										                            </table>
										                            <table class="card p-6 p-lg-10 space-y-4" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 6px; border-collapse: separate !important; width: 100%; overflow: hidden; border: 1px solid #e2e8f0;" bgcolor="#ffffff">
										                              	<tbody>
										                               	 	<tr>
										                                  		<td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 40px;" align="left" bgcolor="#ffffff">
										                                    		<h1 class="h3 fw-700" style="padding-top: 0; padding-bottom: 0; font-weight: 700 !important; vertical-align: baseline; font-size: 28px; line-height: 33.6px; margin: 0;font-family:\'Montserrat\'" align="left">
										                                      			Solicitação de contato
										                                    		</h1>
										                                    		<table class="s-4 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
										                                      			<tbody>
										                                        			<tr>
										                                          				<td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;" align="left" width="100%" height="16"> &#160; </td>
										                                        			</tr>
										                                      			</tbody>
										                                    		</table>
										                                    		<p class="" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;font-family:\'Montserrat\'" align="left"> 

										                                    			<strong>Post:</strong> '.$_POST['post'].' <br> 
										                                    			<strong>Nome:</strong> '.$_POST['name'].' <br>
										                                    			<strong>E-mail:</strong> '.$_POST['mail'].' <br>
										                                    			<strong>Celular:</strong> '.$_POST['phone'].' <br>';  

																			            if(!empty($_POST['inputMessage'])){ 
																			                $mensagem .= '<strong>Mensagem:</strong> '.$_POST['message'].'<br>'; 
																			            } 

            																		$mensagem .= '</p>
            																		<br>
            																		<br>
										                                    		<p class="" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;font-family:\'Montserrat\'">Agradecemos a sua solicitação. Em breve entraremos em contato.</p>
												                                    <table class="s-4 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
												                                      	<tbody>
												                                        	<tr>
												                                          		<td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;" align="left" width="100%" height="16"> &#160;  </td>
												                                        	</tr>
												                                      	</tbody>
												                                    </table>
												                                    <table class="btn btn-primary p-3 fw-700" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 6px; border-collapse: separate !important; font-weight: 700 !important;">
												                                       	<tbody>
												                                         	<tr>
												                                           		<td style="line-height: 24px; font-size: 16px; border-radius: 6px; font-weight: 700 !important; margin: 0;" align="center" bgcolor="#0d6efd">
												                                            		<a href="https://'.$_SERVER['HTTP_HOST'].'/content/'.$_POST['slug'].'" style="color: #ffffff; font-size: 16px; font-family:\'Montserrat\'; text-decoration: none; border-radius: 6px; line-height: 20px; display: block; font-weight: 700 !important; white-space: nowrap; background-color: #0d6efd; padding: 12px; border: 1px solid #0d6efd;">Ver post</a>
												                                          		</td>
												                                        	</tr>
												                                      	</tbody>
												                                    </table>
										                                  		</td>
										                                	</tr>
										                              	</tbody>
										                            </table>
										                            <table class="s-10 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
										                              	<tbody>
										                                	<tr>
										                                  		<td style="line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;" align="left" width="100%" height="40">  &#160; </td>
										                                	</tr>
										                              	</tbody>
										                            </table> 
					                          					</td>
					                        				</tr>
					                      				</tbody>
					                    			</table>
					                    			<!--[if (gte mso 9)|(IE)]>
					                			</td>
					            			</tr>
					                	</tbody>
					            	</table>
					           		<![endif]-->
					                  			</td>
					                		</tr>
					              		</tbody>
					            	</table>
					          	</td>
					        </tr>
						</tbody>
					</table>
				</body>
			</html>';

		$headers = "Content-type: text/html"; 

        $admin_email = get_option( 'admin_email' ); 

        $custom_mailer = new Mail_Service_Content();  

        $custom_mailer->send('sac@traveltec.com.br', "Nova solicitação de contato!", $mensagem, $headers, '');
        $custom_mailer->send($_POST['mail'], "Contato recebido com sucesso!", $mensagem, $headers, '');
        $send = $custom_mailer->send($admin_email, "Nova solicitação de contato!", $mensagem, $headers, '');
        echo $send;
    } 

    add_shortcode('TTCONTEUDO_POSTS', 'shortcode_content');  
	function shortcode_content(){
		$retorno = "";

		$retorno .= '<link rel="preconnect" href="https://fonts.googleapis.com"> 
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
			<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?ver=1.0">';

		$options = [];
		if(get_option( 'valueInfoLuxo' ) == 105){
			$options[] = 105;
		}
		if(get_option( 'valueInfoSolePraia' ) == 109){
			$options[] = 109;
		}
		if(get_option( 'valueInfoCharme' ) == 113){
			$options[] = 113;
		}
		if(get_option( 'valueInfoLua' ) == 114){
			$options[] = 114;
		}
		if(get_option( 'valueInfoCompras' ) == 115){
			$options[] = 115;
		}
		if(get_option( 'valueInfoCruzeiros' ) == 116){
			$options[] = 116;
		}
		if(get_option( 'valueInfoGastronomico' ) == 104){
			$options[] = 104;
		}
		if(get_option( 'valueInfoAventura' ) == 96){
			$options[] = 96;
		}
		if(get_option( 'valueInfoCultural' ) == 98){
			$options[] = 98;
		}
		if(get_option( 'valueInfoDiversidade' ) == 99){
			$options[] = 99;
		}
		if(get_option( 'valueInfoEventos' ) == 103){
			$options[] = 103;
		}
		if(get_option( 'valueInfoEstudos' ) == 102){
			$options[] = 102;
		}
		if(get_option( 'valueInfoEsportivo' ) == 101){
			$options[] = 101;
		}
		if(get_option( 'valueInfoEcoturismo' ) == 100){
			$options[] = 100;
		}
		if(get_option( 'valueInfoNautico' ) == 106){
			$options[] = 106;
		}
		if(get_option( 'valueInfoReligioso' ) == 107){
			$options[] = 107;
		}
		if(get_option( 'valueInfoAgroturismo' ) == 95){
			$options[] = 95;
		}
		if(get_option( 'valueInfoSaude' ) == 108){
			$options[] = 108;
		}
		if(get_option( 'valueNoticias' ) == 91){
			$options[] = 91;
		}
		if(get_option( 'valueInfo' ) == 89){
			$options[] = 89;
		}  

		$retorno .= '<style>
			body{
				font-family: \'Montserrat\' !important;
			}
			.entry-title{
				display:none !important;
			}

			@media(min-width: 766px){
				.card .grid{
					height: 630px;
				}
				#search{
					width: 60%;
				}

				.card-title{ 
	    			font-size: 19px;
				}

				.grid .card-title{
					min-height: 72px; 
				}
			}

			#search input{
			    border: 1px solid #dbdbdb;
    			border-radius: 100px 0px 0px 100px;
    			border-right: 0;
			}
			#search input:focus{
				box-shadow: none;
			}
			#search .input-group-text{
				height: 42px;
			    border-left: none;
			    border-radius: 0px 100px 100px 0px;
			    background-color: #dbdbdb;
			    color: #155cda;
			    padding: 10px 20px;
			    cursor: pointer;
			} 
		</style>';

		$retorno .= '<div class="container">
			<div class="row">
				<div class="col-lg-7 col-12">
					<h3 style="margin-bottom: 0; padding: 10px 0;">
						'.get_the_title().' 
					</h3> 
				</div>
				<div class="col-lg-5 col-12">
					<div class="input-group" id="search" style="float:right;">
					  	<input type="text" class="form-control" placeholder="Pesquisar..." aria-label="Pesquisar..." aria-describedby="basic-addon1" id="searchInput" autocomplete="off" onfocus="this.value=\'\'"/>
					  	<div class="input-group-prepend">
					    	<span class="input-group-text" id="basic-addon1" onclick="searchPostText()"><i class="fa fa-search"></i></span>
					  	</div>
					</div>
					<span style="float:right;">
						<a onclick="showViewList()" data-toggle="tolltip" data-placement="top" title="Visualização em lista"><i class="fa fa-list" style="font-size: 24px;padding: 10px 0;color: #6d6d6d;cursor: pointer;margin-right: 10px;"></i></a>
						<a onclick="showViewGrid()" data-toggle="tolltip" data-placement="top" title="Visualização em grade"><i class="fa fa-th" style="font-size: 24px;padding: 10px 0;color: #6d6d6d;cursor: pointer;margin-right: 10px;"></i></a>
					</span>
				</div>
				<div class="col-lg-12 col-12"> 
					<hr>
				</div>
			</div>

			<input type="hidden" id="optionCategories" value="'.json_encode($options).'">
			<input type="hidden" id="pluginDirURL" value="'.plugin_dir_url( __FILE__ ).'">
			<input type="hidden" id="totalPages" value="">
			<div class="row" id="resultContent">
				<img src="'.plugin_dir_url( __FILE__ ).'assets/img/Update.gif" style="    height: 500px;width: 500px;margin: 0 auto;">
			</div>
			<div class="paginationResult" style="display:none">
				<div class="container" style="margin: 30px 0px;font-family: \'Montserrat\';"> 
					<div class="row justify-content-center"> 
						<div class="col-lg-12 col-12 text-center"> 
							<input type="hidden" class="pageActiveContent" value="1"> 
							<input type="hidden" class="typeContent" value="1"> 
							<a class="aLoadMore" onclick="loadMore()"><button class="btn btn-primary" id="btnLoadMore" style="font-weight: 400;border-radius: 100px;padding: 5px 35px;font-size: 14px;text-transform: uppercase;font-weight: 600;">Veja mais</button></a> 
						</div> 
					</div> 
				</div> 
			</div>
		</div>';

		$retorno .= '<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
			<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
			<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script> 
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
			<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script src="'.plugin_dir_url( __FILE__ ) . 'assets/js/helpers.js?v='.date("dmYHis").'" crossorigin="anonymous"></script>
			<script src="'.plugin_dir_url( __FILE__ ) . 'assets/js/content.js?v='.date("dmYHis").'" crossorigin="anonymous"></script>';

		return $retorno;

	} 
    add_shortcode('TTCONTEUDO_LIST_TOP_POSTS', 'shortcode_content_list_top');  
	function shortcode_content_list_top(){
		$retorno = "";

		$retorno .= '<link rel="preconnect" href="https://fonts.googleapis.com"> 
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
			<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?ver=1.0">';

		$options = [];
		if(get_option( 'valueInfoLuxo' ) == 105){
			$options[] = 105;
		}
		if(get_option( 'valueInfoSolePraia' ) == 109){
			$options[] = 109;
		}
		if(get_option( 'valueInfoCharme' ) == 113){
			$options[] = 113;
		}
		if(get_option( 'valueInfoLua' ) == 114){
			$options[] = 114;
		}
		if(get_option( 'valueInfoCompras' ) == 115){
			$options[] = 115;
		}
		if(get_option( 'valueInfoCruzeiros' ) == 116){
			$options[] = 116;
		}
		if(get_option( 'valueInfoGastronomico' ) == 104){
			$options[] = 104;
		}
		if(get_option( 'valueInfoAventura' ) == 96){
			$options[] = 96;
		}
		if(get_option( 'valueInfoCultural' ) == 98){
			$options[] = 98;
		}
		if(get_option( 'valueInfoDiversidade' ) == 99){
			$options[] = 99;
		}
		if(get_option( 'valueInfoEventos' ) == 103){
			$options[] = 103;
		}
		if(get_option( 'valueInfoEstudos' ) == 102){
			$options[] = 102;
		}
		if(get_option( 'valueInfoEsportivo' ) == 101){
			$options[] = 101;
		}
		if(get_option( 'valueInfoEcoturismo' ) == 100){
			$options[] = 100;
		}
		if(get_option( 'valueInfoNautico' ) == 106){
			$options[] = 106;
		}
		if(get_option( 'valueInfoReligioso' ) == 107){
			$options[] = 107;
		}
		if(get_option( 'valueInfoAgroturismo' ) == 95){
			$options[] = 95;
		}
		if(get_option( 'valueInfoSaude' ) == 108){
			$options[] = 108;
		}
		if(get_option( 'valueNoticias' ) == 91){
			$options[] = 91;
		}
		if(get_option( 'valueInfo' ) == 89){
			$options[] = 89;
		}  

		$retorno .= '<style>
			body{
				font-family: \'Montserrat\' !important;
			}
			.entry-title{
				display:none !important;
			}

			@media(min-width: 766px){
				.card .grid{
					height: 630px;
				}
				#search{
					width: 60%;
				}

				.card-title{ 
	    			font-size: 19px;
				}

				.grid .card-title{
					min-height: 72px; 
				}
			}

			#search input{
			    border: 1px solid #dbdbdb;
    			border-radius: 100px 0px 0px 100px;
    			border-right: 0;
			}
			#search input:focus{
				box-shadow: none;
			}
			#search .input-group-text{
				height: 42px;
			    border-left: none;
			    border-radius: 0px 100px 100px 0px;
			    background-color: #dbdbdb;
			    color: #155cda;
			    padding: 10px 20px;
			    cursor: pointer;
			} 
		</style>';

		$retorno .= '<div class="container">
			<input type="hidden" id="optionCategories" value="'.json_encode($options).'">
			<input type="hidden" id="pluginDirURL" value="'.plugin_dir_url( __FILE__ ).'">
			<input type="hidden" id="totalPages" value="">
			<div class="row" id="resultContentTopPost">
				<img src="'.plugin_dir_url( __FILE__ ).'assets/img/Update.gif" style="    height: 500px;width: 500px;margin: 0 auto;">
			</div>
		</div>

		<div class="container buttonAllPosts" style="display:none"> 
			<div class="row justify-content-center"> 
				<div class="col-lg-12 col-12 text-center"> 
					<input type="hidden" class="pageActiveContent" value="1"> 
					<input type="hidden" class="typeContent" value="1"> 
					<a href="/conteudo-turistico"><button class="btn btn-primary" id="btnLoadMore" style="font-weight: 400;border-radius: 100px;padding: 5px 35px;font-size: 14px;text-transform: uppercase;font-weight: 600;">Veja todos os posts</button></a> 
				</div> 
			</div>  
		</div>';

		$retorno .= '<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
			<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
			<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script> 
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
			<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script src="'.plugin_dir_url( __FILE__ ) . 'assets/js/helpers.js?v='.date("dmYHis").'" crossorigin="anonymous"></script>
			<script src="'.plugin_dir_url( __FILE__ ) . 'assets/js/contenttoppost.js?v='.date("dmYHis").'" crossorigin="anonymous"></script>';

		return $retorno;

	} 

	add_shortcode('TTCONTEUDO_BANNER', 'shortcode_banner');
	function shortcode_banner(){
		$retorno = "";

		$retorno .= '<link rel="preconnect" href="https://fonts.googleapis.com"> 
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?ver=1.0">';
		
		$retorno .= '<style>
			@media(min-width: 767px){
				.imgBanner{
					height: 550px !important;
				}
				.carousel-caption{
					bottom: 30% !important;
				}
				.carousel-caption h5{
					font-size: 60px !important;
				}
			}
			@media(max-width: 766px){
				.carousel-caption{
					display: block !important;
				}
				.carousel-caption h5{
					font-size: 20px !important;
				}
			}
		</style>';

		$options = [];
		if(get_option( 'valueInfoLuxo' ) == 105){
			$options[] = 105;
		}
		if(get_option( 'valueInfoSolePraia' ) == 109){
			$options[] = 109;
		}
		if(get_option( 'valueInfoCharme' ) == 113){
			$options[] = 113;
		}
		if(get_option( 'valueInfoLua' ) == 114){
			$options[] = 114;
		}
		if(get_option( 'valueInfoCompras' ) == 115){
			$options[] = 115;
		}
		if(get_option( 'valueInfoCruzeiros' ) == 116){
			$options[] = 116;
		}
		if(get_option( 'valueInfoGastronomico' ) == 104){
			$options[] = 104;
		}
		if(get_option( 'valueInfoAventura' ) == 96){
			$options[] = 96;
		}
		if(get_option( 'valueInfoCultural' ) == 98){
			$options[] = 98;
		}
		if(get_option( 'valueInfoDiversidade' ) == 99){
			$options[] = 99;
		}
		if(get_option( 'valueInfoEventos' ) == 103){
			$options[] = 103;
		}
		if(get_option( 'valueInfoEstudos' ) == 102){
			$options[] = 102;
		}
		if(get_option( 'valueInfoEsportivo' ) == 101){
			$options[] = 101;
		}
		if(get_option( 'valueInfoEcoturismo' ) == 100){
			$options[] = 100;
		}
		if(get_option( 'valueInfoNautico' ) == 106){
			$options[] = 106;
		}
		if(get_option( 'valueInfoReligioso' ) == 107){
			$options[] = 107;
		}
		if(get_option( 'valueInfoAgroturismo' ) == 95){
			$options[] = 95;
		}
		if(get_option( 'valueInfoSaude' ) == 108){
			$options[] = 108;
		}
		if(get_option( 'valueNoticias' ) == 91){
			$options[] = 91;
		}
		if(get_option( 'valueInfo' ) == 89){
			$options[] = 89;
		}  
		
		$retorno .= '<div id="bannerConteudo"></div>
		
		<input type="hidden" id="pluginDirURL" value="'.plugin_dir_url( __FILE__ ).'"> 
		<input type="hidden" id="optionCategories" value="'.json_encode($options).'">';

		$retorno .= '<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" crossorigin="anonymous"></script> 
			<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
			<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script> 
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
			<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script src="'.plugin_dir_url( __FILE__ ) . 'assets/js/helpers.js?v='.date("dmYHis").'" crossorigin="anonymous"></script>
			<script src="'.plugin_dir_url( __FILE__ ) . 'assets/js/contenttoppost.js?v='.date("dmYHis").'" crossorigin="anonymous"></script>';

		return $retorno;  
	}

    add_shortcode('TTCONTEUDO_POST_CONTENT', 'shortcode_post_content');  
	function shortcode_post_content(){
		$retorno = "";

		$retorno .= '<link rel="preconnect" href="https://fonts.googleapis.com"> 
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?ver=1.0">';

		$retorno .= '<style>
			body{
				font-family: \'Montserrat\' !important;
			}
			.entry-title{
				display:none !important;
			}

			.card-title{
				min-height: 72px;
    			font-size: 19px;
			}

			@media(max-width: 765px){ 
				.bl-1{
					border-top: 1px solid #f1f1f1;
				}
			}

			@media(min-width: 766px){
				.card{
					height: 630px;
				}
				.wp-block-image img{
					width: 70% !important;
				}
				.mr-3{
					padding-right: 30px;
				}
				.ml-3{
					padding: 30px;
				}
				.bl-1{
					border-left: 1px solid #f1f1f1;
				}
			}

			.input-group input, textarea{
				border: 1px solid #f1f1f1 !important;
				padding: 8px !important;
				font-size: 14px !important;
				border-radius: 0 !important;
			}
			.input-group input:focus{
				border: 1px solid #f1f1f1;
    			box-shadow: none;
			}
			.input-group .input-group-text{  
			    border-radius: 0;
			    border: 1px solid #f1f1f1;
			    color: #fff;
			    background-color: #155cda;
			    width: 42px;
			    text-align: center;
			    height: 42px;
				display: grid;
			}
			.btnSolicit{
				border-radius: 0;
			    background-color: #2668dd;
			    border: 1px solid #2668dd;
			}
			h2{
				font-size: 23px !important;
			}
		</style>';

		$retorno .= '<div class="container">

			<div class="row mb-4">
				<div class="col-lg-12 col-md-12 col-12">
					<button class="btn btn-light" onclick="history.back();" style="float:right;font-size: 12px;text-transform: uppercase;font-weight: 600;letter-spacing: 1px;padding: 7px 25px;"><i class="fa fa-arrow-left" style="font-size: 10px;margin-right: 4px;"></i> Voltar</button>
				</div>	
			</div>

			<div class="row">

				<div class="col-lg-9 col-md-9 col-12 mr-3">
					<div class="row"> 
						<div class="col-lg-12 col-md-12 col-12 text-center">
							<img src="" id="imgPostContent"> 
						</div>
						<div class="col-lg-12 col-md-12 col-12"> 
							<h3 style="margin-bottom: 10px;padding: 10px 0;font-size: 25px;" id="titlePostContent"></h3> 
						</div>
						<div class="col-lg-12 col-md-12 col-12" style="font-size: 12px;font-weight: 700;margin-bottom: 10px;"> 
							<i class="fa fa-calendar" style="color:#155cda"></i> <span id="datePostContent" style="margin-right: 20px;margin-left: 5px;"> </span> 
							<i class="fa fa-clock-o" style="color:#155cda"></i> <span id="hourPostContent" style="margin-right: 20px;margin-left: 5px;"> </span> 
							<i class="fa fa-paperclip" style="color:#155cda"></i> <span id="categoryPostContent" style="margin-right: 20px;margin-left: 5px;"> </span> 
						</div> 
						<div class="col-lg-12 col-md-12 col-12"> 
							<hr>
						</div>
						<div class="col-lg-12 col-md-12 col-12" id="postContent"> 
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-12 ml-3 text-center bl-1" style="background-color:#f5f5f5">
					<h5 class="mb-3">Contato</h5>
					<div class="input-group mb-4">
					  	<div class="input-group-prepend">
					    	<span class="input-group-text" id="basic-addon1"><i class="fa fa-info"></i></span>
					  	</div>
					  	<input type="text" class="form-control" placeholder="Post" aria-label="Post" aria-describedby="basic-addon1" id="titlePostContentForm" disabled>
					</div>
					<div class="input-group mb-4">
					  	<div class="input-group-prepend">
					    	<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
					  	</div>
					  	<input type="text" class="form-control" placeholder="Nome completo" aria-label="Nome completo" aria-describedby="basic-addon1" id="nomePostContentForm" autocomplete="off">
					</div>
					<div class="input-group mb-4">
					  	<div class="input-group-prepend">
					    	<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
					  	</div>
					  	<input type="text" class="form-control" placeholder="E-mail" aria-label="E-mail" aria-describedby="basic-addon1" id="mailPostContentForm" autocomplete="off">
					</div>
					<div class="input-group mb-4">
					  	<div class="input-group-prepend">
					    	<span class="input-group-text" id="basic-addon1"><i class="fa fa-whatsapp"></i></span>
					  	</div>
					  	<input type="text" class="form-control" placeholder="Celular" aria-label="Celular" aria-describedby="basic-addon1" id="phonePostContentForm" autocomplete="off">
					</div>
					<div class="form-group mb-4"> 
				    	<textarea class="form-control" id="messagePostContentForm" rows="4" placeholder="Deixe sua mensagem..."></textarea>
				  	</div>
					<button class="btn btn-primary btnSolicit" onclick="sendMailContact()">Enviar solicitação</button>

					<hr style="border-top: 1px solid #d2c9c9;margin: 50px 0;">

					<div id="carrosselTopPosts"></div>

				</div>

			</div>
		</div>


		<input type="hidden" id="pluginDirURL" value="'.plugin_dir_url( __FILE__ ).'"> 
		<input type="hidden" id="url_ajax" value="'.admin_url('admin-ajax.php').'"> 
		<input type="hidden" id="slug_post" value="">  ';

		$retorno .= '<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" crossorigin="anonymous"></script> 
			<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
			<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script> 
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
			<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script src="'.plugin_dir_url( __FILE__ ) . 'assets/js/helpers.js?v='.date("dmYHis").'" crossorigin="anonymous"></script>
			<script src="'.plugin_dir_url( __FILE__ ) . 'assets/js/content.js?v='.date("dmYHis").'" crossorigin="anonymous"></script>';

		return $retorno;  
	}

	function sendMailContact(){

	}
