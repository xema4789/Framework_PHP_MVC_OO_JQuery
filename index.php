<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/';

    if ((isset($_GET['page'])) && ($_GET['page']==="controller_user") ){
		include("view/inc/top_page_user.php");

	}else if((isset($_GET['page'])) && ($_GET['page']==="controller_order") ){
		include("view/inc/top_page_order.php");
	}else if((isset($_GET['page'])) && ($_GET['page']==="controller_home") ){
		include("view/inc/top_page_home.php");
	}else if((isset($_GET['page'])) && ($_GET['page']==="controller_contact") ){
		include("view/inc/top_page_contact.php");
	}else if((isset($_GET['page'])) && ($_GET['page']==="controller_cart") ){
		include("view/inc/top_page_cart.php");
	}else if((isset($_GET['page'])) && ($_GET['page']==="controller_shop") ){
		include("view/inc/top_page_shop.php");
	}else if((isset($_GET['page'])) && ($_GET['page']==="controller_login") ){
		include("view/inc/top_page_login.php");
	}else{
		include("view/inc/top_page.php");
	}

	// if ((isset($_GET['page'])) && ($_GET['page']==="controller_order") ){
	// 	include("view/inc/top_page_order.php");
	// }else{
	// 	include("view/inc/top_page.php");
	// }
	session_start();
	
?>
<div id="wrapper">		
    <div id="header">    	
    	<?php
    	    include("view/inc/header.php");
    	?>        
    </div>  
    <div id="menu">
		<?php
		    include("view/inc/menu.php");
		?>
    </div>	
    <div id="pages">
    	<?php 
		    include("view/inc/pages.php"); 
		?>        
        <br style="clear:both;" />
    </div>
    <div id="footer">   	   
	    <?php
	        include("view/inc/footer.php");
	    ?>        
    </div>


</div>
<?php
    include("view/inc/bottom_page.php");
?>
    