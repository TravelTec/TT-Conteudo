<?php

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	function convertTitleToName($string){ 
        return str_replace("&#8211-", "", str_replace("--", "-", str_replace("?", "", str_replace("!", "", str_replace(".", "", str_replace(",", "", str_replace(";", "", str_replace(":", "", str_replace(" ", "-", str_replace("–", "", str_replace("&#8211", "", strtolower(preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(º)/"),explode(" ","a A e E i I o O u U n N c "),$string)))))))))))));
    } 

	function importData($author){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  	CURLOPT_URL => "https://blog.traveltec.com.br/wp-json/wp/v2/posts/?per_page=100",
		  	CURLOPT_RETURNTRANSFER => true,
		  	CURLOPT_ENCODING => "",
		  	CURLOPT_MAXREDIRS => 10,
		  	CURLOPT_TIMEOUT => 30,
		  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  	CURLOPT_CUSTOMREQUEST => "GET",
		  	CURLOPT_HTTPHEADER => array(
		    	"cache-control: no-cache",
		    	"postman-token: 956a97a4-c992-efdc-539d-079f9566f5cd"
		  	),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  	return 1;
		} else {
		  	
			$resposta = json_decode($response);
			if(!empty($resposta) || $resposta != null || $resposta != "null"){
				$retorno = [];

				$retorno["posts"] = [];
				for($i = 0; $i<count($resposta); $i++){
					$data = $resposta[$i];
					
					$post_tags = $data->tags;
					$post_categories = $data->categories;

					$post_date = $data->date;
					$post_date_gmt = $data->date_gmt;
					$post_content = $data->content->rendered;
					$post_title = $data->title->rendered;
					$post_excerpt = $data->excerpt->rendered;
					$post_status = $data->status;
					$post_name = convertTitleToName($data->title->rendered);
					$post_modified = $data->modified;
					$post_modified_gmt = $data->modified_gmt;
					$post_type = $data->type;

					$post_content = str_replace("aid=7978920", "aid={IdAfBooking}", $post_content);
					$post_content = str_replace("pcrid=8431", "pcrid={IdAfPromo}", $post_content);
					$post_content = str_replace('data-vi-partner-id="P00083397"', 'data-vi-partner-id="{IdAfViator}"', $post_content);
					$post_content = str_replace('<script async="" src="https://www.viator.com/orion/partner/widget.js"></script>', '{scriptViator}', $post_content);

					$retorno["posts"][] = array("post_author" => $author, "post_date" => $post_date, "post_date_gmt" => $post_date_gmt, "post_content" => $post_content, "post_title" => $post_title, "post_excerpt" => $post_excerpt, "post_status" => $post_status, "post_name" => $post_name, "post_modified" => $post_modified, "post_modified_gmt" => $post_modified_gmt, "post_type" => $post_type);

					$retorno["posts_id"][] = $data->id;

					$id_featured_image = $data->featured_media;

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

					$retorno["categories_posts"][] = $post_categories;
					$retorno["tags_posts"][] = $post_tags;
					$retorno["featured_image_posts"][] = $post_featured_image;
				}

				$retorno["categories"] = getCategories();
				$retorno["tags"] = getTags();

				return json_encode($retorno);

			}else{
				return 0;
			}

		}

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