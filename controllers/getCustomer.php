<?php
session_start(); 
/**
 * Erik Medina 06-03-2021
 * Controller gestion de datos del cliente
 */
include_once '../models/database/connection.php';

$constants = new Constants();
$conn= new Connection();


if(!isset($_POST['id']) && !isset($_POST['search'])){ // Extraer todos los clientes

	$query = "select id,nombre, apellidos, telefono, email, direccion, poblacion from clientes" ;

	$result =$conn->prepare($query);

	if (is_array($result) ){		
		echo json_encode($result);
	}else{		
		echo json_encode(0);
	}


}elseif(isset($_POST['id'])){ // Datos por id de cliente

  $id =(int) trim($_POST['id']) ;
  $params = array($id);
  $tipos='i';

	$query = "select id,nombre, apellidos, telefono, email, direccion, poblacion from clientes where id = ?" ;

	$result =$conn->prepare($query,$params,$tipos);
	if (is_array($result) ){		
		echo json_encode($result);
	}else{		
		echo json_encode(0);
	}


}elseif (isset($_POST['search'])) {
	# code...
}
