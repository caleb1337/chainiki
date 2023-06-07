<?php

["name" => $chainik_name,  "article" => $chainik_article,  "price" => $chainik_price , "id"=> $chainik_id] = $_POST;
//var_dump($_POST);

//var_dump(empty($_POST["name"]));
//var_dump(empty($_POST["price"]));


require '../model/model-redact-chainik.php';
$link = '/chainiki';
header('Location:'.$link);
//в конце делаем header redirect на main.php