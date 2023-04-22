<?php

  function connection(){
    $host = "localhost";
    $username = "iamthedev";
    $password = "orenodatabase69";
    $database = "bccat_system";
  

    $con = new mysqli($host, $username, $password, $database);

    if($con->connect_error){
      echo $con->connect_error;
    }
    else{
      return $con;
    }

  }
?>