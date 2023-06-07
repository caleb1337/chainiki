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
    $sql = " DELETE FROM tovar WHERE id = '$id' ";
    $result  = $conn->query($sql);
        
    
}
catch(Exception $error){ echo "Ошибка!", $error->getMessage();

}


$conn->close();