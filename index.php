<?php
  session_start();

  /**
   *  Erik Medina 05-03-2021
   *  Prueba Andes 
   *  version 1.0
   */

  if (!isset($_SESSION['id'])) {
  	$title = "Prueba de Desarrollo Andes SCD.";
  	 include_once('view/layout/header.php');
  	 include('view/cliente.php');
  	 include_once('view/dataT.php');
  	 include_once('view/modalEdit.php');
  	 include_once('view/layout/footer.php');
  }else{

  }

?>