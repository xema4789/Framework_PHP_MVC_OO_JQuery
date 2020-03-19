<?php
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/'; 

 switch($_GET['op']){
   case 'list_login':
      include("module/login/view/view_login.html");
   break;

    case 'login':

    break;

    case 'register':
      // pintar_login('register');
      // include("module/login/view/view_login.html");



    break;


 }
?>