<?php

//include("view/inc/top_page.php");

	switch($_GET['page']){
		case "controller_home";
			include("module/inicio/controller/".$_GET['page'].".php");
			break;
		case "controller_user";
			include("module/user/controller/".$_GET['page'].".php");
			break;

		case "controller_order";
			include("module/order/controller/".$_GET['page'].".php");
			break;
		case "services";
			include("module/services/".$_GET['page'].".php");
			break;
		case "aboutus";
			include("module/aboutus/".$_GET['page'].".php");
			break;
		case "controller_contact";
			include("module/contact/controller/".$_GET['page'].".php");
			break;
		case "controller_shop";
			include("module/shop/controller/".$_GET['page'].".php");
			break;	
		case 'controller_login';
			include("module/login/controller/".$_GET['page'].".php");
		break;
		case "controller_cart";
			include("module/cart/controller/".$_GET['page'].".php");
			break;
		case "404";
			include("view/inc/error".$_GET['page'].".php");
			break;
		case "503";
			include("view/inc/error".$_GET['page'].".php");
			break;
		default;
			include("module/inicio/controller/".$_GET['page'].".php");
			break;
	}
?>