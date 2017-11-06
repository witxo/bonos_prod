<?php
	include_once("dbconfig.php");
	include_once("funciones.php");

    $url = "http://www.ivema.es/crm/service/v4_1/rest.php";
    $username = "admin";
    $password = "jotake";


	    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
	
	$sql = "Select max(numero) as maximo from fact_facturas where deleted = 0 and fact_facturas_type = 'nomina'";
		$handle = mysql_query($sql);

$row = mysql_fetch_object($handle);

$numero_fact = $row->maximo + 1;



    //function to make cURL request
    function call($method, $parameters, $url)
    {
        ob_start();
        $curl_request = curl_init();

        curl_setopt($curl_request, CURLOPT_URL, $url);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);

        $jsonEncodedData = json_encode($parameters);

        $post = array(
             "method" => $method,
             "input_type" => "JSON",
             "response_type" => "JSON",
             "rest_data" => $jsonEncodedData
        );

        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($curl_request);
        curl_close($curl_request);

        $result = explode("\r\n\r\n", $result, 2);
        $response = json_decode($result[1]);
        ob_end_flush();

        return $response;
    }

    //login --------------------------------------------- 
    $login_parameters = array(
         "user_auth" => array(
              "user_name" => $username,
              "password" => md5($password),
              "version" => "1"
         ),
         "application_name" => "RestTest",
         "name_value_list" => array(),
    );

    $login_result = call("login", $login_parameters, $url);

    /*
    echo "<pre>";
    print_r($login_result);
    echo "</pre>";
    */

    //get session id
    $session_id = $login_result->id;

    //create factura ------------------------------------- 
    $set_entry_parameters = array(
         //session id
         "session" => $session_id,

         //The name of the module from which to retrieve records.
         "module_name" => "fact_Facturas",

         //Record attributes
         "name_value_list" => array(
              //to update a record, you will nee to pass in a record id as commented below
              //array("name" => "id", "value" => "9b170af9-3080-e22b-fbc1-4fea74def88f"),
              array("name" => "name", "value" => "Test Nomina"),
              array("name" => "date_closed", "value" => "2017-11-06"),
              array("name" => "fecha_contable_c", "value" => "2017-11-06"),
              array("name" => "clasificacion_c", "value" => "sueldos"),
              array("name" => "fact_facturas_type", "value" => "nomina"),
              array("name" => "estado", "value" => "emitida"),
              array("name" => "numero", "value" => $numero_fact),

         ),
    );

    $set_entry_result = call("set_entry", $set_entry_parameters, $url);

    echo "<pre>";
	echo "<p>Created Factura";
    print_r($set_entry_result);
    echo "</pre>";

	$factura_id = $set_entry_result->id;  

$set_relationship_parameters = array(  
                //session id  
                "session" => $session_id,  
                //The name of the module from which to retrieve records.  
                "module_name" => "fact_Facturas",  
                "module_id" => $factura_id,  
                "link_field_name" => "accounts_fact_facturas",  
                "related_ids" => array('c60c5be6-b56c-31a9-135b-59ad26d9847f',) ,
  				'name_value_list' => array() 
            );  
  
  
            $set_relationship_result = call("set_relationship", $set_relationship_parameters, $url);  
  
  
            echo "<pre>";  
			echo "<p>Created Assignment Account";
            print_r($set_relationship_result);  
            echo "</pre>";  


    //create item------------------------------------- 
    $set_entry_parameters = array(
         //session id
         "session" => $session_id,

         //The name of the module from which to retrieve records.
         "module_name" => "fact_Items",

         //Record attributes
         "name_value_list" => array(
              //to update a record, you will nee to pass in a record id as commented below
              //array("name" => "id", "value" => "9b170af9-3080-e22b-fbc1-4fea74def88f"),
              array("name" => "name", "value" => "Test Nomina Item"),
              array("name" => "precio_ud", "value" => "500"),
         ),
    );

    $set_entry_result = call("set_entry", $set_entry_parameters, $url);

    echo "<pre>";
	echo "<p>Created Item";
    print_r($set_entry_result);
    echo "</pre>";

	$item_id = $set_entry_result->id;  

$set_relationship_parameters = array(  
                //session id  
                "session" => $session_id,  
                //The name of the module from which to retrieve records.  
                "module_name" => "fact_Facturas",  
                "module_id" => $factura_id,  
                "link_field_name" => "items",  
                "related_ids" => array($item_id,) ,
  				'name_value_list' => array() 
            );  


  
  
            $set_relationship_result = call("set_relationship", $set_relationship_parameters, $url);  
  
  
            echo "<pre>";  
			echo "<p>Created Assignment Item";
            print_r($set_relationship_result);  
            echo "</pre>";  


  //change factura ------------------------------------- 
    $set_entry_parameters = array(
         //session id
         "session" => $session_id,

         //The name of the module from which to retrieve records.
         "module_name" => "fact_Facturas",

         //Record attributes
         "name_value_list" => array(
              //to update a record, you will nee to pass in a record id as commented below
              array("name" => "id", "value" => $factura_id),
              array("name" => "name", "value" => "Test Nomina Changed"),
              array("name" => "retencion", "value" => "15"),           
              array("name" => "tipo_repercutido", "value" => "01"),           
              array("name" => "repercutido", "value" => "21"),           
           ),
      );
      
    $set_entry_result = call("set_entry", $set_entry_parameters, $url);

    echo "<pre>";
	echo "<p>Changed Fact";
    print_r($set_entry_result);
    echo "</pre>";

?>