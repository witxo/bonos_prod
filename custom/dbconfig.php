<?php
class DBConnection{
	function getConnection(){
	  //change to your database server/user name/password
		$db = mysql_connect("localhost","root","Ivema_2010") or
         die("Could not connect: " . mysql_error());
    //change to your database name
		mysql_select_db("clases_new") or 
		     die("Could not select database: " . mysql_error());
			 
return $db;			 
	}

function getCRMConnection(){
	  //change to your database server/user name/password
		$db = mysql_connect("localhost","root","Ivema_2010") or
         die("Could not connect: " . mysql_error());
    //change to your database name
		mysql_select_db("crm") or 
		     die("Could not select database: " . mysql_error());
return $db;
	}


}
?>