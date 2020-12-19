<?php
require_once 'ConexionBDD.php';

if(isset($_GET['shortened'])){
    $shortened = $_GET['shortened'];

    //Obtener conexion
    $conn = ConexionBDD::conectar();
    $sql = "SELECT origin_url FROM shortened WHERE shortened = '$shortened' ";
    $result = $conn->query($sql);

    if($result->columnCount() == 0){
        echo "No existe una url para esta url acortada" . $shortened . "\n";
    } else {
        foreach($result as $row)
        {
            echo 'Redireccionando';
            header("Location:  http://" .$row['origin_url'], 301);
            die();
        }
    }

} else {
    "No se cargado la url a redireccionar";
}