<?php

include_once('excel.php');

if(isset($_POST) == true){
    //generate unique file name
    $fileName = basename($_FILES["file"]["name"]);
    
    //file upload path
    $targetDir = "../nominas/";
    $targetFilePath = $targetDir . $fileName;
    
    //allow certain file formats
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    

        //upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
			carga_excel_nominas ($targetFilePath);
            $response['status'] = 'ok';
        }else{
            $response['status'] = 'err';
        }

    
    //render response data in JSON format
    echo json_encode($response);
}