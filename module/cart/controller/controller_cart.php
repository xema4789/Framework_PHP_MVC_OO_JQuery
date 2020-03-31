<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/';
include ($path . "/module/cart/model/DAOCart.php");


switch ($_GET['op']){
    case "list":
        include("module/cart/view/cart.html");

    break;

    case 'add_cart':
        //Coger id del producto y mandarlo al dao

    break;



}


?>