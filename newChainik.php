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

        $sql = " INSERT INTO `tovar` (`id`, `name`, `article`, `price`) VALUES (NULL, 'chai1', '00143', '2300')";

        


    $result  = $conn->query($sql);

}
catch(Exception $error) {
    echo "Ошибка!", $error->getMessage();
}
$conn->close();