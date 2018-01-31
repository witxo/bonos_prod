<?php
	include_once("dbconfig.php");
	include_once("funciones.php");

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



function create_factura ($tipo_fact, $profesor, $clasificacion, $fecha, $fecha_contable, $grupo, $irpf, $iva, $base, $log)
{
    $url = "http://www.ivema.es/crm/service/v4_1/rest.php";
    $username = "admin";
    $password = "jotake";
  
//  	setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
//	$texto = ucwords(strftime("%B").' '.Date('Y'));
  
   $mesesN=array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
             "Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  
  $arr = explode('-', $fecha);

  if ($clasificacion == 'irpf')
    $texto = 'IRPF ';
  elseif ($clasificacion == 'ss')
    $texto = 'Seguridad Social ';

  
  
   $mes = $arr[1];
  
 $texto =  $texto.$mesesN[$mes].' '.$arr[0];


	    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
	
	$sql = "Select max(numero) as maximo from fact_facturas where deleted = 0 and fact_facturas_type = '".$tipo_fact."'";
		$handle = mysql_query($sql);

$row = mysql_fetch_object($handle);

$numero_fact = $row->maximo + 1;



    //function to make cURL request


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

  	if ($log == 1)
    {
    
    echo "<pre>";
    print_r($login_result);
    echo "</pre>";
    
    }

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
              array("name" => "name", "value" => $texto),
              array("name" => "date_closed", "value" => $fecha),
              array("name" => "fecha_contable_c", "value" => $fecha_contable),
			  array("name" => "grupo_c", "value" => $grupo),           
              array("name" => "clasificacion_c", "value" => $clasificacion),
              array("name" => "gasto_si_no_c", "value" => 'Si'),
              array("name" => "ingreso_si_no_c", "value" => 'No'),
              array("name" => "fact_facturas_type", "value" => $tipo_fact),
              array("name" => "estado", "value" => "pagada"),
              array("name" => "numero", "value" => $numero_fact),

         ),
    );

    $set_entry_result = call("set_entry", $set_entry_parameters, $url);

  	if ($log == 1)
    {
    echo "<pre>";
	echo "<p>Created Factura";
    print_r($set_entry_result);
    echo "</pre>";
    }
	$factura_id = $set_entry_result->id;  

$set_relationship_parameters = array(  
                //session id  
                "session" => $session_id,  
                //The name of the module from which to retrieve records.  
                "module_name" => "fact_Facturas",  
                "module_id" => $factura_id,  
                "link_field_name" => "accounts_fact_facturas",  
                "related_ids" => array($profesor,) ,
  				'name_value_list' => array() 
            );  
  
  
            $set_relationship_result = call("set_relationship", $set_relationship_parameters, $url);  
  
  	if ($log == 1)
    {  
            echo "<pre>";  
			echo "<p>Created Assignment Account";
            print_r($set_relationship_result);  
            echo "</pre>";  
    }

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
              array("name" => "name", "value" => $texto),
              array("name" => "precio_ud", "value" => $base),
         ),
    );

    $set_entry_result = call("set_entry", $set_entry_parameters, $url);

  	if ($log == 1)
    {
    echo "<pre>";
	echo "<p>Created Item";
    print_r($set_entry_result);
    echo "</pre>";
    }
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
  
  	if ($log == 1)
    {  
            echo "<pre>";  
			echo "<p>Created Assignment Item";
            print_r($set_relationship_result);  
            echo "</pre>";  
    }

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
              array("name" => "name", "value" => $texto),
              array("name" => "retencion", "value" => $irpf),           
              array("name" => "tipo_repercutido", "value" => "01"),           
              array("name" => "repercutido", "value" => $iva),           
           ),
      );
      
    $set_entry_result = call("set_entry", $set_entry_parameters, $url);
  	if ($log == 1)
    {
    echo "<pre>";
	echo "<p>Changed Fact";
    print_r($set_entry_result);
    echo "</pre>";
    }   
}
?>