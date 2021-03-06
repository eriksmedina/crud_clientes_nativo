<?php
session_start(); 
/**
 * Erik Medina  06-03-2021
 * Controller  procesa datos del clientes
 * version 1.0
 */

include_once '../models/database/connection.php';

// Llamado a la clase que almacena las constantes del sistema
$conn = new Connection();
$constants = new Constants();

// Variables traídas desde el formulario usando el metodo POST
  foreach($_POST as $nombre_campo => $valor){
     $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
     eval($asignacion);
  }

  if ($task =='new') { // add 
  	if(!isset($_POST['id'])){
  		if (!empty($names) && !empty($email)){
  			$params = array($names, $lastname, $tlf, $email, $address,$population) ;

  			$tipos ="ssssss" ;
  			$op = "I";
  			$sql="INSERT INTO clientes(nombre, apellidos, telefono, email, direccion,poblacion) VALUES (?,?,?,?,?,?)";

  			$customer_id = $conn->prepare($sql,$params,$tipos,$op);

		    if($customer_id['ID'] > 0){ // Insert ok         
		    	echo json_encode(array("id_insert"=>$customer_id['ID']));
		    }else{
		    	echo json_encode(array("mensaje" => "No se pudo insertar", 'codigo' =>  $result, 'alertas' => "Fallo sql"));
		    }

		}else{
			echo json_encode(array("mensaje" => "No se pudo insertar", 'codigo' =>  $result, 'alertas' => "faltan datos"));
		}
	}
}elseif ($task =='edit') {
	if (!empty($names_e) && !empty($email_e) && !empty($id)){
		$params = array($names_e, $lastname_e, $tlf_e, $email_e, $address_e,$population_e,$id) ;

  			$tipos ="ssssssi" ;
  			$op = "U";
  			$sql="UPDATE clientes set nombre = ? , apellidos= ?,  telefono = ?, email= ? , direccion = ? , poblacion = ? where id = ? ";

  			$rows_affected = $conn->prepare($sql,$params,$tipos,$op);

		    echo json_encode(array($rows_affected));

	}else{
		echo json_encode(array("mensaje" => "No se pudo editar", 'codigo' =>  $result, 'alertas' => "faltan datos para la edicion"));
	}
}elseif ($task =='delete') {
	if (!empty($id)){
			$params = array($id) ;
		    $tipos ="i" ;
  			$op = "U";
  			$sql="DELETE FROM clientes  where id = ? ";

  			$rows_affected = $conn->prepare($sql,$params,$tipos,$op);

		    echo json_encode(array($rows_affected));

	}else{
		echo json_encode(array("mensaje" => "No se pudo eliminar", 'codigo' =>  $result, 'alertas' => "error id eliminar"));
	}
}else{
	echo json_encode(array("mensaje" => "Opcion no es valida"));
}