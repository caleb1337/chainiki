<?php

// Подключение к БД
$servername = "localhost";
$operatorname="root";
$operatorpassword = "";


$conn = new mysqli($servername,$operatorname,$operatorpassword);
if($conn->connect_error){
die("Connetction failed".$conn->connect_error);
}
// INSERT INTO `tovar` (`id`, `name`, `article`, `price`) VALUES (NULL, 'test', '001', '200');
// если надо внести чайник в таблицу
try{
    $sql = " CREATE DATABASE testproj1 ";
    
    $sql2 = " USE testproj1 ";

    $sql3 = "CREATE TABLE table1
    (
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT ,
        name VARCHAR(100) NOT NULL,
        article VARCHAR(40) NOT NULL,
        price INT(5) NOT NULL
    )";

    $result  = $conn->query($sql);
    $result  = $conn->query($sql2);
    $result  = $conn->query($sql3);
    

}catch(Exception $error){ echo "Ошибка!", $error->getMessage();

}



$conn->close();