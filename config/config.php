<?php
try{
    $host = "mysql:host=localhost;dbname=hotel-booking";
    $user = "root";
    $pass = "";

    $connect = new PDO("$host","$user","$pass");
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "Connect iS TRUE";

}catch(PDOException $e){
    echo "failed connect : " . $e->getMessage();
}

?>