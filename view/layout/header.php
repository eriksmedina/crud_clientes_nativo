 <?php
 /**
  *  Erik Medina 05-03-2021
  *  Layout Header 
  */
if(!strpos($_SERVER['PHP_SELF'], "index.php"))  exit("NO PERMITIDO...");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <link href="thirdparty/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="thirdparty/DataTables/DataTables-1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="thirdparty/DataTables/Buttons-1.5.1/css/buttons.dataTables.min.css">
    
    <link rel="stylesheet" href="thirdparty/DataTables/DataTables-1.10.16/css/responsive.dataTables.min.css">
    
    <link rel="stylesheet" href="thirdparty/fontawesome/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/styles.css">    
    <title><?php echo $title ; ?></title>
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> !</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#" id="nav_nuevo">Nuevo Cliente <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  id="nav_adm" href="#">Administrar clientes</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Salir</a>
      </li>
    </ul>
  </div>
</nav>
    <div id="loaderContainer" hidden>
        <div id="loader">Cargando</div>
    </div>
    <div class="title text-center" id="wellcome">
        <img src="image/Logo.png" class="rounded mx-auto d-block" alt="Andes">
        <h4><u>Bienvenido</u></h4>
    </div>