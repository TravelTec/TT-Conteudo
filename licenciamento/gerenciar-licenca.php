<?php



	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );



	add_action( 'wp_ajax_add_categoria', 'add_categoria' );

    	add_action( 'wp_ajax_nopriv_add_categoria', 'add_categoria' );

	function add_categoria(){



    	$meta_name = $_POST['meta_name'];

    	$meta_value = $_POST['meta_value'];



    	$server = DB_HOST; 

        $user = DB_USER; 

        $database = DB_NAME; 

        $pass = DB_PASSWORD; 



        $connSite = conectar_mysql_wp($server, $user, $pass, $database);  



        $sqlGetMetaCategory = $connSite->prepare("SELECT * FROM `wp_options` WHERE option_name = '".$meta_name."'"); 

	    $sqlGetMetaCategory->execute(); 



		$getMetaCategory = $sqlGetMetaCategory->fetch(\PDO::FETCH_ASSOC);  



		$delMetaCategory = $connSite->prepare("DELETE FROM wp_options WHERE option_name = '".$meta_name."'"); 

		$delMetaCategory->execute();



		$setMetaCategory = $connSite->prepare("INSERT INTO wp_options (option_name, option_value, autoload) VALUES ('".$meta_name."', ".$meta_value.", 'yes')"); 

		$setMetaCategory->execute();

		

		

	}



	add_action( 'wp_ajax_checkLicenseIugu', 'checkLicenseIugu' );

    add_action( 'wp_ajax_nopriv_checkLicenseIugu', 'checkLicenseIugu' );

    function checkLicenseIugu(){ 



    	$license = $_POST['license'];

    	$urlOrigin = $_POST['urlOrigin'];

    	$urlHost = $_POST['urlHost']; 



    	$server = DB_HOST; 

        $user = DB_USER; 

        $database = DB_NAME; 

        $pass = DB_PASSWORD; 



        $connSite = conectar_mysql_wp($server, $user, $pass, $database);  



        $sqlGetLicense = $connSite->prepare("SELECT * FROM `wp_options` WHERE option_name = 'setValueLicense'"); 

	    $sqlGetLicense->execute(); 



		$getLicense = $sqlGetLicense->fetch(\PDO::FETCH_ASSOC); 



		if(empty($getLicense) || is_null($getLicense)){

 

			$setLicense = $connSite->prepare("INSERT INTO wp_options (option_name, option_value, autoload) VALUES ('setValueLicense', '".$license."', 'yes')"); 

			$setLicense->execute();  



		}else{



			$idLicense = $getLicense["option_id"]; 



			$setLicense = $connSite->prepare("UPDATE wp_options SET option_value = '".$license."' WHERE option_name = 'setValueLicense'"); 

			$setLicense->execute(); 



		}



		$curl = curl_init();



		curl_setopt_array($curl, array(

		   	CURLOPT_URL => "https://api.traveltec.com.br/project/public/api/licenciador",

		  	CURLOPT_RETURNTRANSFER => true,

		  	CURLOPT_ENCODING => "",

		  	CURLOPT_MAXREDIRS => 10,

		  	CURLOPT_TIMEOUT => 30,

		  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

		  	CURLOPT_CUSTOMREQUEST => "POST",

		  	CURLOPT_POSTFIELDS => "{\"license\": \"".$license."\", \"urlOrigin\": \"".$urlOrigin."\", \"urlHost\": \"".$urlHost."\"}",

		  	CURLOPT_HTTPHEADER => array(

		    	"cache-control: no-cache",

		    	"content-type: application/json" 

		  	),

		));



		$response = curl_exec($curl);

		$err = curl_error($curl);



		curl_close($curl);



		if ($err) {

		  	echo json_encode(array("status" => 0, "message" => "Não foi possível verificar sua licença. Tente novamente."));

		} else {

		  	$resposta = json_decode($response, true);

		  	if($resposta["status"] == "ERROR"){

		  		echo json_encode(array("status" => 2, "message" => $resposta["message"]));

		  	}else{

		  		echo json_encode(array("status" => 1, "message" => $resposta["message"]));

		  	}

		}



    }



?>

