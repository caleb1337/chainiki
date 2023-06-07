<?php
// Подключение к БД
$servername = "localhost";
$operatorname="root";
$operatorpassword = "";
$dbname = "chainiki";
// connector for data base


$conn = new mysqli($servername,$operatorname,$operatorpassword,$dbname);
if($conn->connect_error){
die("Connetction failed".$conn->connect_error);
}
try{
    $data = [];
    $sql = "SELECT * FROM tovar";
    if($result  = $conn->query($sql)){
        foreach($result as $row){
           array_push($data,$row);
        }
    }
}
catch(Exception $error){ echo "Ошибка!", $error->getMessage();

}

$conn->close();