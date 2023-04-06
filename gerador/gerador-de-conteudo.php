<?php



	defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); 



	function conectar_mysql_wp($server, $user, $pass, $database){  

     

        try{

            // create a PostgreSQL database connection

            $conn = new \PDO("mysql:host=$server;dbname=$database", $user, $pass);

            

            return $conn;

        }catch (\PDOException $e){

            // report error message

            echo $e->getMessage();

        }

    }   

    add_action( 'wp_ajax_import_content', 'import_content' );

    add_action( 'wp_ajax_nopriv_import_content', 'import_content' );

    function import_content(){ 





		$getCategories = [];

		if(intval(get_option( 'valueInfoDocumentos' )) == 90){

			$getCategories[] = 90;

		}

		if(intval(get_option( 'valueNoticias' )) == 91){

			$getCategories[] = 91;

		}

		if(intval(get_option( 'valueInfoVacinas' )) == 92){

			$getCategories[] = 92;

		}

		if(intval(get_option( 'valueInfoVistos' )) == 93){

			$getCategories[] = 93;

		}

		if(intval(get_option( 'valueInfoAgroturismo' )) == 95){

			$getCategories[] = 95;

		}

		if(intval(get_option( 'valueInfoAventura' )) == 96){

			$getCategories[] = 96;

		}

		if(intval(get_option( 'valueInfoConsumo' )) == 97){

			$getCategories[] = 97;

		}

		if(intval(get_option( 'valueInfoCultural' )) == 98){

			$getCategories[] = 98;

		} 

		if(intval(get_option( 'valueInfoDiversidade' )) == 99){

			$getCategories[] = 99;

		} 

		if(intval(get_option( 'valueInfoEcoturismo' )) == 100){

			$getCategories[] = 100;

		} 

		if(intval(get_option( 'valueInfoEsportivo' )) == 101){

			$getCategories[] = 101;

		} 

		if(intval(get_option( 'valueInfoEstudos' )) == 102){

			$getCategories[] = 102;

		} 

		if(intval(get_option( 'valueInfoEventos' )) == 103){

			$getCategories[] = 103;

		}  

		if(intval(get_option( 'valueInfoGastronomico' )) == 104){

			$getCategories[] = 104;

		}  

		if(intval(get_option( 'valueInfoLuxo' )) == 105){

			$getCategories[] = 105;

		}  

		if(intval(get_option( 'valueInfoNautico' )) == 106){

			$getCategories[] = 106;

		}  

		if(intval(get_option( 'valueInfoReligioso' )) == 107){

			$getCategories[] = 107;

		}  

		if(intval(get_option( 'valueInfoSaude' )) == 108){

			$getCategories[] = 108;

		}  

		if(intval(get_option( 'valueInfoSolePraia' )) == 109){

			$getCategories[] = 109;

		}  

		if(intval(get_option( 'valueInfoCharme' )) == 113){

			$getCategories[] = 113;

		}  

		if(intval(get_option( 'valueInfoLua' )) == 114){

			$getCategories[] = 114;

		}  

		if(intval(get_option( 'valueInfoCompras' )) == 115){

			$getCategories[] = 97;

		}  

		if(intval(get_option( 'valueInfoCruzeiros' )) == 116){

			$getCategories[] = 116;

		}   

		if(intval(get_option( 'valueInfo' )) == 89){

			$getCategories[] = 89;

		}    
		
	    	if(empty(get_option( 'setValueLicense' ))){
				echo json_encode(array("status" => 0, "message" => "Antes de iniciar as importações, valide sua licença na aba Configurações."));
		}else if(empty($getCategories)){
				echo json_encode(array("status" => 0, "message" => "Antes de iniciar as importações, selecione o tipo de conteúdo que deseja."));
		}else{ 


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

			$author = $getUser[0]->ID;

			

			/**********************************************************************************************/  



			$server = '162.240.67.31';

	        $user = 'blogtraveltec_wp';

	        $database = 'blogtraveltec_wp';

	        $pass = '%T^ka^1ERWix'; 



	        $connBlog = conectar_mysql_wp($server, $user, $pass, $database);  



	        $dateAfter = date("2023-01-01 00:00:00");

	        $dateBefore = date("Y-m-d 23:59:59");

			$sqlPosts = $connBlog->prepare("SELECT ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, post_name, post_modified, post_modified_gmt, post_type FROM `wp_posts` where post_status = 'publish'");

		    $sqlPosts->execute(); 

			$retornoPosts = $sqlPosts->fetchAll(\PDO::FETCH_ASSOC);   



		    $resposta = [];



		    for($i=0; $i<count($retornoPosts); $i++){



				$resposta["posts"][] = '('.$retornoPosts[$i]["post_author"].', \''.$retornoPosts[$i]["post_date"].'\', \''.$retornoPosts[$i]["post_date_gmt"].'\', \''.$retornoPosts[$i]["post_content"].'\', \''.$retornoPosts[$i]["post_title"].'\', \''.$retornoPosts[$i]["post_excerpt"].'\', \''.$retornoPosts[$i]["post_status"].'\', \''.$retornoPosts[$i]["post_name"].'\', \''.$retornoPosts[$i]["post_modified"].'\', \''.$retornoPosts[$i]["post_modified_gmt"].'\', \''.$retornoPosts[$i]["post_type"].'\')';

				$resposta["posts_array"][] = array("ID" => $retornoPosts[$i]["ID"], "post_author" => $retornoPosts[$i]["post_author"], "post_date" => $retornoPosts[$i]["post_date"], "post_date_gmt" => $retornoPosts[$i]["post_date_gmt"], "post_content" => $retornoPosts[$i]["post_content"], "post_title" => $retornoPosts[$i]["post_title"], "post_excerpt" => $retornoPosts[$i]["post_excerpt"], "post_status" => $retornoPosts[$i]["post_status"], "post_name" => $retornoPosts[$i]["post_name"], "post_modified" => $retornoPosts[$i]["post_modified"], "post_modified_gmt" => $retornoPosts[$i]["post_modified_gmt"], "post_type" => $retornoPosts[$i]["post_type"]); 



			}



			/**** *****/ 



			for($i=0; $i<count($retornoPosts); $i++){ 



				$postId = $retornoPosts[$i]["ID"];

				$post_id[] = $retornoPosts[$i]["ID"]; 



				$sqlPostMeta = $connBlog->prepare("SELECT * FROM `wp_postmeta` WHERE meta_key LIKE '%rank%' AND post_id = ".$postId);

			    $sqlPostMeta->execute(); 

				$retornoPostMeta = $sqlPostMeta->fetchAll(\PDO::FETCH_ASSOC);  



				for ($x=0; $x<count($retornoPostMeta); $x++) {

					$resposta["rank_meta"][$postId][] = array($retornoPostMeta[$x]["meta_key"], $retornoPostMeta[$x]["meta_value"]);

				} 



				$sqlPostThumbnail = $connBlog->prepare("SELECT meta_value FROM `wp_postmeta` WHERE meta_key = '_thumbnail_id' AND post_id = ".$postId);

			    $sqlPostThumbnail->execute(); 

				$retornoPostThumbnail = $sqlPostThumbnail->fetch(\PDO::FETCH_ASSOC);  



				$id_featured_image = $retornoPostThumbnail["meta_value"]; 



				$sqlFeaturedMedia = $connBlog->prepare("SELECT guid FROM `wp_posts` WHERE ID = ".$id_featured_image);

			    $sqlFeaturedMedia->execute(); 

				$retornoFeaturedMedia = $sqlFeaturedMedia->fetch(\PDO::FETCH_ASSOC);  



				$resposta["featured_image_posts"][] = $retornoFeaturedMedia["guid"];



				$sqlPostCategory = $connBlog->prepare("SELECT a.term_taxonomy_id, b.taxonomy FROM wp_term_relationships a

														INNER JOIN wp_term_taxonomy b ON a.term_taxonomy_id = b.term_taxonomy_id

														WHERE b.taxonomy = 'category' 

														AND a.object_id = ".$postId);

			    $sqlPostCategory->execute(); 

				$retornoPostCategory = $sqlPostCategory->fetchAll(\PDO::FETCH_ASSOC); 



				for($z=0; $z<count($retornoPostCategory); $z++){

					$resposta["categories_posts"][$postId][] = intval($retornoPostCategory[$z]["term_taxonomy_id"]); 

				}



				$sqlPostTag = $connBlog->prepare("SELECT b.term_taxonomy_id, b.taxonomy, c.slug FROM wp_term_relationships a

													INNER JOIN wp_term_taxonomy b ON a.term_taxonomy_id = b.term_taxonomy_id

													INNER JOIN wp_terms c ON c.term_id = b.term_id

													WHERE b.taxonomy = 'post_tag' 

													AND a.object_id = ".$postId);

			    $sqlPostTag->execute(); 

				$retornoPostTag = $sqlPostTag->fetchAll(\PDO::FETCH_ASSOC); 



				for($y=0; $y<count($retornoPostTag); $y++){

					$resposta["tags_posts"][$postId][] = array(intval($retornoPostTag[$y]["term_taxonomy_id"]), $retornoPostTag[$y]["slug"]); 

				}



			} 



			/**** *****/ 



			$resposta["categories"] = getCategories();

			$resposta["tags"] = getTags();



			/**************************************************************************************************************/



			$server = '162.240.67.31';

	        $user = DB_USER;

	        $database = DB_NAME;

	        $pass = DB_PASSWORD;



	        $connSite = conectar_mysql_wp($server, $user, $pass, $database);  



			function rudr_upload_file_by_url( $image_url ) {



				// it allows us to use download_url() and wp_handle_sideload() functions

				require_once( ABSPATH . 'wp-admin/includes/file.php' );



				// download to temp dir

				$temp_file = download_url( $image_url );



				if( is_wp_error( $temp_file ) ) {

					return false;

				}



				// move the temp file into the uploads directory

				$file = array(

					'name'     => basename( $image_url ),

					'type'     => mime_content_type( $temp_file ),

					'tmp_name' => $temp_file,

					'size'     => filesize( $temp_file ),

				);

				$sideload = wp_handle_sideload(

					$file,

					array(

						'test_form'   => false // no needs to check 'action' parameter

					)

				);



				if( ! empty( $sideload[ 'error' ] ) ) {

					// you may return error message if you want

					return false;

				} 



				return $sideload;



			}



			/* CATEGORIAS */



				if(!empty($resposta["categories"]) || !is_null($resposta["categories"])){

					$categories = $resposta["categories"];

					for($i=0; $i<count($categories); $i++){  

						if(in_array($categories[$i]["id"], $getCategories)){

							$categoryTitle = $categories[$i]["name"];

							$categorySlug = $categories[$i]["slug"];

							

							$deleteCategoryIdExistente .= $categories[$i]["id"].',';  

							$deleteCategorySlug .= '"'.$categories[$i]["slug"].'" ,'; 



							$insertTags .= '('.$categories[$i]["id"].', "'.$categories[$i]["name"].'", "'.$categories[$i]["slug"].'", '.$categories[$i]["term_group"].'), '; 



							$insertTagTaxonomy .= '('.$categories[$i]["id"].', "category", "", 0, '.$categories[$i]["count"].'), ';

						}

					}

				} 



				/* DELETA CATEGORIAS PELO SLUG */ 

				$sqlDeleteCatBySlug = $connSite->prepare("DELETE FROM wp_terms WHERE slug IN (".substr($deleteCategorySlug, 0, -1).")");

			    $sqlDeleteCatBySlug->execute(); 

				/* */ 



				/* DELETA TAXAONOMIA DA CATEGORIA PELO ID */

				$sqlDeleteTaxCatByid = $connSite->prepare("DELETE FROM wp_term_taxonomy WHERE term_id IN ".substr($deleteCategoryIdExistente, 0, -1));

			    $sqlDeleteTaxCatByid->execute(); 

				/* */ 



				/* INSERE CATEGORIAS */ 

				$sqlInsertCat = $connSite->prepare("INSERT INTO wp_terms (term_id, name, slug, term_group) VALUES ".substr($insertTags, 0, -2));

			    $sqlInsertCat->execute();  

				/* */ 



				/* INSERE TAXONOMIA */

				$sqlInsertTaxCat = $connSite->prepare("INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES ".substr($insertTagTaxonomy, 0, -2));

			    $sqlInsertTaxCat->execute();  

				/* */



			/* CATEGORIAS */  



			/* TAGS */ 


				$insertTags = "";
				$insertTagTaxonomy = "";
				$deleteTagIdExistente = "";
				$deleteTagSlug = "";
				if(!empty($resposta["tags"]) || !is_null($resposta["tags"])){

					$tags = $resposta["tags"];

					for($i=0; $i<count($tags); $i++){   

						$tagTitle = $tags[$i]["name"];

						$tagSlug = $tags[$i]["slug"];

						

						$deleteTagIdExistente .= $tags[$i]["id"].',';  

						$deleteTagSlug .= '"'.$tags[$i]["slug"].'" ,';   



						$insertTags .= '('.$tags[$i]["id"].', "'.$tags[$i]["name"].'", "'.$tags[$i]["slug"].'", '.$tags[$i]["term_group"].'), '; 



						$insertTagTaxonomy .= '('.$tags[$i]["id"].', "post_tag", "", 0, '.$tags[$i]["count"].'), '; 

					}

				} 



				/* DELETA CATEGORIAS PELO SLUG */ 

				$sqlDeleteTagBySlug = $connSite->prepare("DELETE FROM wp_terms WHERE slug IN (".substr($deleteTagSlug, 0, -1).")");

			    $sqlDeleteTagBySlug->execute(); 

				/* */ 



				/* DELETA TAXAONOMIA DA CATEGORIA PELO ID */

				$sqlDeleteTaxTagByid = $connSite->prepare("DELETE FROM wp_term_taxonomy WHERE term_id IN ".substr($deleteTagIdExistente, 0, -1));

			    $sqlDeleteTaxTagByid->execute(); 

				/* */ 



				/* INSERE CATEGORIAS */ 

				$sqlInsertTag = $connSite->prepare("INSERT INTO wp_terms (term_id, name, slug, term_group) VALUES ".substr($insertTags, 0, -2));

			    $sqlInsertTag->execute();  

				/* */ 



				/* INSERE TAXONOMIA */

				$sqlInsertTaxTag = $connSite->prepare("INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES ".substr($insertTagTaxonomy, 0, -2));

			    $sqlInsertTaxTag->execute();  

				/* */



			/* TAGS */



			/* POSTS */ 



				if(!empty($resposta["posts_array"]) || !is_null($resposta["posts_array"])){

					$posts_array = $resposta["posts_array"];

					$posts = $resposta["posts"];



					$setCategoryPost = $resposta["categories_posts"];

					$setFeaturedImagePost = $resposta["featured_image_posts"];

					$setTagPost = $resposta["tags_posts"]; 

					$setMetaRankPost = $resposta["rank_meta"];



					for($count=0; $count<count($resposta["posts_array"]); $count++){



						$postID = $posts_array[$count]["ID"]; 

						$dados_post = $posts_array[$count];

						$dados_posts_json = $posts[$count];



						if(count(array_intersect($setCategoryPost[$postID], $getCategories)) > 0){



							$dados_post["post_content"] = str_replace('https://redeturistica.com.br/formulario-de-cotacao/', 'https://'.$_SERVER["HTTP_HOST"].'/formulario-de-cotacao/', $dados_post["post_content"]); 



							$postTitle = $dados_post["post_title"];

							$postName = $dados_post["post_name"];

	 

							$sqlDeletePostByName = $connSite->prepare("DELETE FROM wp_posts WHERE post_name = '".$postName."'");

						    $sqlDeletePostByName->execute();   

							

							$sqlInsertPost = $connSite->prepare("INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, post_name, post_modified, post_modified_gmt, post_type) VALUES ".$dados_posts_json);

						    $sqlInsertPost->execute();



							$post_id = $connSite->lastInsertId();



							$filepath = $setFeaturedImagePost[$count]; //Change this to the actual file path... 



							if($filepath != "null" || $filepath != null){

							    $image = rudr_upload_file_by_url( $filepath );

								$filename = date("dMYHis").'.jpg'; //Change this to the actual file name... 

							    $date = date("Y-m-d H:i:s");



								$sqlFeaturedImage = $connSite->prepare("SELECT guid, ID FROM `wp_posts` WHERE guid = '".$image["url"]."'");

							    $sqlFeaturedImage->execute();  

								$retornoFeaturedImage = $sqlFeaturedImage->fetch(\PDO::FETCH_ASSOC); 



								if($retornoFeaturedImage == false){



								    $sqlInsertFeaturedImage = $connSite->prepare("INSERT INTO wp_posts (post_author, post_title, post_name, post_date, post_date_gmt, post_modified, post_modified_gmt, post_type, guid, post_status, post_mime_type, post_parent) VALUES ('".$posts_array["post_author"]."', '".$postTitle."', '".$filename."', '".$date."', '".$date."', '".$date."', '".$date."', 'attachment', '".$image["url"]."', 'inherit', '".$image["type"]."', '".$post_id."')");

								    $sqlInsertFeaturedImage->execute();  



									$featured_media_id = $connSite->lastInsertId();

								}else{ 



									$featured_media_id = $retornoFeaturedImage["ID"];



								}



								$sqlInsertMetaFeaturedImage = $connSite->prepare("INSERT INTO wp_postmeta (meta_value, meta_key, post_id) VALUES ('".$featured_media_id."', '_thumbnail_id', '".$post_id."')");

							    $sqlInsertMetaFeaturedImage->execute();



								$sqlInsertMeta2FeaturedImage = $connSite->prepare("INSERT INTO wp_postmeta (meta_value, meta_key, post_id) VALUES ('".$featured_media_id."', '_wp_attached_file', '".$post_id."')");

							    $sqlInsertMeta2FeaturedImage->execute(); 

							}



							if(!is_null($setMetaRankPost[$postID])){

								for($t=0; $t<count($setMetaRankPost[$postID]); $t++){   

									$sqlInsertRankMeta = $connSite->prepare("INSERT INTO wp_postmeta (meta_key, meta_value, post_id) VALUES ('".$setMetaRankPost[$postID][$t][0]."', '".$setMetaRankPost[$postID][$t][1]."', ".$post_id.")");

								    $rankMeta[] = $sqlInsertRankMeta->execute();  

								}

							}



							if(!is_null($setCategoryPost[$postID])){



								$sqlCategoryTaxonomyRelationship = $connSite->prepare("SELECT * FROM `wp_term_relationships` WHERE object_id = ".$post_id);

							    $sqlCategoryTaxonomyRelationship->execute(); 

								$retornoCategoryTaxonomyRelationship = $sqlCategoryTaxonomyRelationship->fetch(\PDO::FETCH_ASSOC);  



								if(!is_null($retornoCategoryTaxonomyRelationship)){ 

									$sqlDeleteCategoryRelationship = $connSite->prepare("DELETE FROM wp_term_relationships WHERE term_taxonomy_id IN ".$retornoCategoryTaxonomyRelationship);

								    $sqlDeleteCategoryRelationship->execute(); 

								}



								for($x=0; $x<count($setCategoryPost[$postID]); $x++){  



									$sqlCategoryTaxonomy = $connSite->prepare("SELECT term_taxonomy_id FROM `wp_term_taxonomy` WHERE term_id = ".$setCategoryPost[$postID][$x]);

								    $sqlCategoryTaxonomy->execute(); 



									$retornoCategoryTaxonomy = $sqlCategoryTaxonomy->fetch(\PDO::FETCH_ASSOC);  



									$jsonCategoryTaxonomy = '('.$post_id.', '.$retornoCategoryTaxonomy['term_taxonomy_id'].'), ';

							

									$sqlInsertCategoryRelationship = $connSite->prepare("INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES ".substr($jsonCategoryTaxonomy, 0, -2));

								    $insertCategoryR[] = $sqlInsertCategoryRelationship->execute();  

								}   

							}  



							if(!is_null($setTagPost[$postID])){

								for($y=0; $y<count($setTagPost[$postID]); $y++){    



									$sqlTagTaxonomy = $connSite->prepare("SELECT * FROM `wp_terms` WHERE slug = '".$setTagPost[$postID][$y][1]."'");

									$sqlTagTaxonomy->execute();



									$retornoTagTaxonomy = $sqlTagTaxonomy->fetch(\PDO::FETCH_ASSOC);  

									if(!is_null($retornoTagTaxonomy) || !empty($retornoTagTaxonomy)){

										$term_id = $retornoTagTaxonomy["term_id"];



										$sqlTermTagTaxonomy = $connSite->prepare("SELECT term_taxonomy_id FROM `wp_term_taxonomy` WHERE term_id = ".$term_id);

									    $sqlTermTagTaxonomy->execute(); 



										$retornoTermTagTaxonomy = $sqlTermTagTaxonomy->fetch(\PDO::FETCH_ASSOC);  



										$jsonTagTaxonomy = '('.$post_id.', '.$retornoTermTagTaxonomy['term_taxonomy_id'].'), '; 

								

										$sqlInsertTagRelationship = $connSite->prepare("INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES ".substr($jsonTagTaxonomy, 0, -2));

									    $insertTagR[] = $sqlInsertTagRelationship->execute();   

									}   

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



    function convertTitleToName($string){ 

        return str_replace("&#8211-", "", str_replace("--", "-", str_replace("?", "", str_replace("!", "", str_replace(".", "", str_replace(",", "", str_replace(";", "", str_replace(":", "", str_replace(" ", "-", str_replace("–", "", str_replace("&#8211", "", strtolower(preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(º)/"),explode(" ","a A e E i I o O u U n N c "),$string)))))))))))));

    } 



	function getCategories(){ 

		$curl = curl_init();



		curl_setopt_array($curl, array(

		  	CURLOPT_URL => "https://blog.traveltec.com.br/wp-json/wp/v2/categories/?per_page=100",

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



		$response = curl_exec($curl);

		$err = curl_error($curl);



		curl_close($curl);



		if ($err) {

		  	echo "cURL Error #:" . $err;

		} else {

		  	$resposta = json_decode($response);

			$retorno = [];

			if(!empty($resposta) || $resposta != null || $resposta != "null"){



				for($i = 0; $i<count($resposta); $i++){

					$data = $resposta[$i];



					$id = $data->id; 

					$name = $data->name;

					$slug = $data->slug;

					$taxonomy = $data->taxonomy; 

					$count = $data->count; 



					$retorno[] = array("id" => $id, "name" => $name, "slug" => $slug, "taxonomy" => $taxonomy, "term_group" => 0, "count" => $count);

				} 



				return $retorno;



			}

		}

	}



	function getTags(){ 

		$curl = curl_init();



		curl_setopt_array($curl, array(

		  	CURLOPT_URL => "https://blog.traveltec.com.br/wp-json/wp/v2/tags/?per_page=100",

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



		$response = curl_exec($curl);

		$err = curl_error($curl);



		curl_close($curl);



		if ($err) {

		  	echo "cURL Error #:" . $err;

		} else {

		  	$resposta = json_decode($response);

			$retorno = [];

			if(!empty($resposta) || $resposta != null || $resposta != "null"){



				for($i = 0; $i<count($resposta); $i++){

					$data = $resposta[$i];



					$id = $data->id; 

					$name = $data->name;

					$slug = $data->slug;

					$taxonomy = $data->taxonomy; 

					$count = $data->count; 



					$retorno[] = array("id" => $id, "name" => $name, "slug" => $slug, "taxonomy" => $taxonomy, "term_group" => 0, "count" => $count);

				} 



				return $retorno;



			}

		}

	}



?>
