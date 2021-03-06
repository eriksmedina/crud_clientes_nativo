<?php
//session_start();
/**
 * Erik Medina 05-03-2021
 * 
 */
 include_once '../models/Constants.php';

class Connection {
    private $con;
    private $credentials;
    private $queryPrepared;

    public function __construct() {
        $this->credentials = new Constants();

        $host = $this->credentials->dbHost;
        $port = $this->credentials->dbPort;
        $user = $this->credentials->dbUser;
        $pass = $this->credentials->dbPassword;
        $db = $this->credentials->dbDatabase;

        $this->con = mysqli_connect("$host", "$user","$pass", "$db","$port") or die("Error connection...");  
    }

    public function closeCon()
    {
        mysqli_close($this->con);
    }

    public function prepare($query,  $params = array(), $tipos = null,$op = 'S') {
        if ($this->con){
            $parametros =array();
            if(count($params)>=1){
                foreach($params as $key => $value) {
                    $parametros[] = utf8_decode($value);
                }
            }            
            try
            {
              $this->queryPrepared = $this->con->prepare($query);

              if (!$this->queryPrepared){              
                var_dump("Error:".$this->con->error) ;
                exit();
              }
              //tipos:
                //i => entero
                //d => double,float
                //s => string
                //b => blob
                
                if($parametros&&$tipos){
                 $bind_names[] = $tipos;
                 $arraytipos=str_split($tipos); 
                 $posicionesBlob=array();
                    for ($i=0; $i<count($parametros);$i++){
                       $bind_name = 'bind' . $i;
                       if($arraytipos[$i]=='b'){
                        array_push($posicionesBlob,$i);//guardo la posicion de los blob en los $parametros
                        $$bind_name=null;
                       }else{
                        $$bind_name = $this->con->real_escape_string($params[$i]);
                       }
                      $bind_names[] = &$$bind_name;
                    }
                  $return = call_user_func_array(array($this->queryPrepared,'bind_param'),$bind_names);
                  if(!empty($posicionesBlob)){//ciclo para guardar archivos blob
                    foreach ($posicionesBlob as $clave => $valor){
                        $byteToSend = 2048;// valor de max_allowed_packet variable  mysql config 
                        $j=0;
                        while($contentToSend = substr($params[$valor], $j, $byteToSend)) {
                            $this->queryPrepared->send_long_data($valor, $contentToSend);//$valor es la posicion que quiero guardar
                            $j+=$byteToSend;
                        } //end while
                    } // end for
                  }//end if
                }

                if(!$this->queryPrepared->execute()){
                    $msg= "Falló la ejecución: (" . $this->con->errno . ") " . $this->con->error;                    
                }else{                                        
                    if ($op == 'S'){
                       $nowRows = $this->queryPrepared->get_result();
                        if($nowRows->num_rows >0){
                          return $nowRows->fetch_all(MYSQLI_ASSOC) ;
                        }else{                          
                         // $resp[] = "Ocurrio un problema en la sentencia SQL y/o no se afectaron registros";
                          $resp = 0 ;
                          return $resp ;
                        }
                    } elseif ($op == 'I') {
                        $nowRows=$this->queryPrepared->affected_rows;
                        if($nowRows>=1){
                            $result = $this->con->query("SELECT LAST_INSERT_ID() as ID;");
                            while ($fila =  $result->fetch_assoc()) {
                                $datos_pr[] = $fila;
                            }
                          return $datos=$datos_pr[0];
                        }else{
                            return 0 ; // Fallo la insercion
                        }
                    } elseif ($op == 'U') {
                       $nowRows=$this->queryPrepared->affected_rows;
                       if($nowRows>=1){
                         return $nowRows ;
                       }else{
                         return 99 ;
                       } 
                    }
               }               
            }
            catch(Exception $e)
            {
                echo json_encode(array("query" => $query, 'error' => $e));
                exit;
            }
        
     } else{
        echo "No connection ...." ;
     }// end if 

    }


}

/*$conn = new Connection() ;

$sql ="select * from clientes where id = ? and telefono = ?" ;
$params = array(1,'31382421377');
$tipos ="is";
$resu = $conn->prepare($sql,$params, $tipos) ;

var_dump($resu) ; */