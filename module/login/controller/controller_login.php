<?php
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/'; //no me esta pillando bien el path y en consecuencia el include de despues
 include($path . "/module/login/model/DAOLogin.php");

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