<?php

class ConexionBDD 
{
    

    static public function conectar()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=url-shortener", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";

        return $conn;
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }

        return null;
    }

    //static public function 

}