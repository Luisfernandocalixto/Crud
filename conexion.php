<?php

$servidor="localhost";   
$db="crud";   
$username="root";   
$password="root";

try {
    //code...
    $conexion = new PDO("mysql:host=$servidor;dbname=$db",$username,$password);

} catch (Exception $e) {
    //throw $th;
    echo $e->getMessage();
}


?>