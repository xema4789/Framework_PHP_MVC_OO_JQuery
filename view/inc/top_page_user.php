<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Alta de Usuario</title>
		
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" />
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> -->

		<!-- Prueba datatable -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
		<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

		<!-- LINKS SLIDESHOW -->
		<!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    	<script src="slideshow/js/jquery.slides.js"></script> -->


    	<script type="text/javascript">
        	$(function() {
        		$('#f_ini').datepicker({
        			dateFormat: 'yy/mm/dd', 
        			changeMonth: true, 
        			changeYear: true, 
        			yearRange: '2020:2025',
        			onSelect: function(selectedDate) {
        			}
        		});
			});
			$(function() {
        		$('#f_fin').datepicker({
        			dateFormat: 'yy/mm/dd', 
        			changeMonth: true, 
        			changeYear: true, 
        			yearRange: '2020:2025',
        			onSelect: function(selectedDate) {
        			}
        		});
        	});
	    </script>
		<!-- <link href="view/css/style.css" rel="stylesheet" type="text/css" /> -->
		<link rel="stylesheet" href="view/smoth-corporate-html-template/smoth/css/responsive.css">
		<script src="view/smoth-corporate-html-template/smoth/js/vendor/modernizr-2.8.3.min.js"></script>


		<link rel="stylesheet" href="view/smoth-corporate-html-template/smoth/css/bootstrap.min.css">
        <link rel="stylesheet" href="view/smoth-corporate-html-template/smoth/css/font-awesome.min.css">
        <link rel="stylesheet" href="view/smoth-corporate-html-template/smoth/css/pe-icon-7-stroke.css">
        <link rel="stylesheet" href="view/smoth-corporate-html-template/smoth/css/owl.carousel.css">
		<link rel="stylesheet" href="view/smoth-corporate-html-template/smoth/css/animate.css">
		<link rel="stylesheet" href="view/smoth-corporate-html-template/smoth/css/magnific-popup.css">
		<link rel="stylesheet" href="view/smoth-corporate-html-template/smoth/css/meanmenu.css">
        <link rel="stylesheet" href="view/smoth-corporate-html-template/smoth/style.css">
	    <!-- <script src="module/user/model/validate_user.js"></script> -->
		<!-- <script type="text/javascript" src="module/lang/translate.js"></script> -->
		<script type="text/javascript" src="module/lang/translate.js"></script>
		<script type="text/javascript" src="module/user/model/validate_user.js"></script>
		<script type="text/javascript" src="module/user/view/controller_ls.js"></script>
		<script type="text/javascript" src="module/user/model/controler_up.js"></script>
		<script type="text/javascript" src="module/search/view/js/function_search.js"></script>
		
    </head>
    <body>