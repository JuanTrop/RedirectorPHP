<?php

require 'ConexionBDD.php';

if(isset($_POST['url'])){
    $url = $_POST['url'];

    //Obtener conexion
    $conn = ConexionBDD::conectar();

   //Verificar que no existe la urlç
    $sql = "SELECT origin_url FROM shortened WHERE origin_url = '$url' ";
    $result = $conn->query($sql);


    if(!$result){
        echo "Ya existe una url acortada a este sitio" . $url . "\n";
        var_dump($result);
    } else {
        echo "Creando redirección";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    // Output: 54esmdr0qf
        $shortened = substr(str_shuffle($permitted_chars), 0, 3);
        $sql = "INSERT INTO shortened (origin_url, shortened) VALUES ('$url', '$shortened') ";
        echo $shortened . "\n";
        $result = $conn->query($sql);



        if($result->columnCount() == 0){
            echo "Ingreso exitoso";
        } else {
            echo "Ingreso fallido";
        }
    }

} else 
{
    echo "No se ha escrito una url";
}