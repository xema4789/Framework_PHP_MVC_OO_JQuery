<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/Framework/';
include ($path . "/module/contact/model/DAOContact.php");
session_start();
switch($_GET['op']){

    case 'list':
        include("module/contact/view/contactus.html");
    break;
}