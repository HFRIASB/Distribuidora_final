<?php
    $mysqli = new mysqli('localhost','root','','distribuidora');
    if(mysqli_connect_errno()){
        echo 'La conexion fallida: ',mysqli_connect_error();
        exit();
    }

?>