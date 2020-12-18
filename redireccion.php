<?php

require 'ConexionBDD.php';

if(isset($_POST['url'])){
    $url = $_POST['url'];

    //Obtener conexion
    $conn = ConexionBDD::conectar();

   //Verificar que no existe la urlç
    $query = $conn->prepare("SELECT origin_url FROM shortened WHERE origin_url = '$url' ");
    $query->execute();

    if($query != null){
        echo "Ya existe una url acortada a este sitio" . $url ;
    } else {
        echo "Creando redirección";
        $query = $conn->prepare("INSERT INTO shortened ");
    }

} else {
    echo "No se ha escrito una url";
}