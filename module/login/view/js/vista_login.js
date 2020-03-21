$(document).ready(function(){
    // alert("oleee los caracoles");



    pintar_menu("user");
    pintar_login('login');

    $('#lo_register').on("click",function(){
        // callback="index.php?page=controller_login&op=register";
        // window.location(callback);
        pintar_login('register');
    });
 

     



    function pintar_login(tipo){

        switch (tipo){
            case 'register':
                $('.login').empty();
                $('<div></div>').attr('class',"op_login").appendTo('.login').html (
                '<h1>Register</h1>'+
                '<fieldset>'+
                '<tr>'+
                    '<td><legend></legend></td>'+
                    '<td><label>Nombre:</label></td>'+
                    '<td><input type="text" name="re_user" id="re_user"><br><br></td>'+
                    '<td><a id="error_re_user" class="error"></a><br></td>'+
                '</tr>'+
                '<tr>'+
                    '<td><label>Contraseña:</label></td>'+
                    '<td><input type="password" id="re_password" name="re_password"><br><br></td>'+
                    '<td><a id="error_re_passwd" class="error"></a><br></td>'+
                '</tr>'+
                '<tr>'+
                    '<td><label>Email:</label></td>'+
                    '<td><input type="email" id="re_email" name="re_email"><br><br></td>'+
                    '<td><a id="error_re_email" class="error"></a><br></td>'+
                    // '<td><a class="btn" id="re_register" type="submit">Registrarse</a><br></td>'+
                    '<input type="submit" value="Registrarse" class="btn" id="re_register">'+
                '</tr>'+
                '</fieldset>'
                );
            break;

            case 'login':
                $('.login').empty();
                $('<div></div>').attr('class',"op_login").appendTo('.login').html (
                    '<div ><a class="btn" id="login">Login</a></div>'+
                        '<div class="autocomplete"> '+
                        '<input id="user" placeholder="Nombre" type="text" />'+
                        '<input id="password" placeholder="Contraseña" type="password" />'+ 
                    '</div>'+
                    '<a id="lo_register">Registrate</a>'
                );
            break;
        }

    }




















    function pintar_menu(tipo){

        switch(tipo){
            case 'admin':
                // main-menu
                $('<div></div>').attr('class',"op_menu").appendTo('.main-menu').html (
                    '<nav>'+
									'<ul>'+
										'<li class="active"><a href="index.php?page=controller_home&op=list" data-tr="Inicio"><i class="fa fa-angle-down"></i></a>'+
											'<ul class="submenu">'+
												'<li><a href="index.html" data-tr="No entrar (slider)"></a></li>'+
												'<li><a href="index-2.html" data-tr="No entrar"></a></li>'+
												'<li><a href="index.php?page=controller_home&op=list" data-tr="La buena"></a></li>'+
											'</ul>'+
										'</li>'+
										'<li><a href="index.php?page=aboutus" data-tr="Conocenos"></a></li>'+
										'<li><a href="index.php?page=services" data-tr="Servicios"></a></li>'+
										'<li><a  data-tr="Idioma"><i class="fa fa-angle-down"></i></a> '+
											'<ul class="submenu">'+
												'<li><a href="#" data-tr="Espanyol" id="btn-es" name="btn-es"></a></li>'+
												'<li><a href="#" data-tr="Ingles" id="btn-en" name="btn-en"></a></li>'+
												'<li><a href="#" data-tr="Valenciano" id="btn-va" name="btn-va"></a></li>'+
											'</ul>'+
										'</li>'+
										'<li><a href="index.php?page=controller_shop&op=list" data-tr="Tienda"></a></li>'+
										'<li><a data-tr="Hotel"><i class="fa fa-angle-down"></i></a> '+
											'<ul class="submenu">'+
												'<li><a href="index.php?page=controller_user&op=list" data-tr="Administrador"></a></li>'+
												'<li><a href="index.php?page=controller_order&op=list" data-tr="Usuario"></a></li>'+
												'<li><a href="blog-details.html" data-tr="En construccion"></a></li>'+
											'</ul>'+
										'</li>'+
										'<li><a href="index.php?page=controller_contact&op=list" data-tr="Contacto" ></a></li>'+
										'<li><a href="index.php?page=controller_login&op=list_login" data-tr="Entrar"></a></li>'+
									'</ul>'+
								'</nav>'
                    );
            break;

            case 'user':
                $('<div></div>').attr('class',"op_menu").appendTo('.main-menu').html (
                    '<nav>'+
									'<ul>'+
										'<li class="active"><a href="index.php?page=controller_home&op=list" data-tr="Inicio"><i class="fa fa-angle-down"></i></a>'+
											'<ul class="submenu">'+
												'<li><a href="index.html" data-tr="No entrar (slider)"></a></li>'+
												'<li><a href="index-2.html" data-tr="No entrar"></a></li>'+
												'<li><a href="index.php?page=controller_home&op=list" data-tr="La buena"></a></li>'+
											'</ul>'+
										'</li>'+
										'<li><a href="index.php?page=aboutus" data-tr="Conocenos"></a></li>'+
										'<li><a href="index.php?page=services" data-tr="Servicios"></a></li>'+
										'<li><a  data-tr="Idioma"><i class="fa fa-angle-down"></i></a> '+
											'<ul class="submenu">'+
												'<li><a href="#" data-tr="Espanyol" id="btn-es" name="btn-es"></a></li>'+
												'<li><a href="#" data-tr="Ingles" id="btn-en" name="btn-en"></a></li>'+
												'<li><a href="#" data-tr="Valenciano" id="btn-va" name="btn-va"></a></li>'+
											'</ul>'+
										'</li>'+
										'<li><a href="index.php?page=controller_shop&op=list" data-tr="Tienda"></a></li>'+
										'<li><a href="index.php?page=controller_contact&op=list" data-tr="Contacto" ></a></li>'+
										'<li><a href="index.php?page=controller_login&op=list_login" data-tr="Entrar"></a></li>'+
									'</ul>'+
								'</nav>'
                    );

            break;

            default://No está logueado
            $('<div></div>').attr('class',"op_menu").appendTo('.main-menu').html (
                '<nav>'+
                                '<ul>'+
                                    '<li class="active"><a href="index.php?page=controller_home&op=list" data-tr="Inicio"><i class="fa fa-angle-down"></i></a>'+
                                        '<ul class="submenu">'+
                                            '<li><a href="index.html" data-tr="No entrar (slider)"></a></li>'+
                                            '<li><a href="index-2.html" data-tr="No entrar"></a></li>'+
                                            '<li><a href="index.php?page=controller_home&op=list" data-tr="La buena"></a></li>'+
                                        '</ul>'+
                                    '</li>'+
                                    '<li><a href="index.php?page=aboutus" data-tr="Conocenos"></a></li>'+
                                    '<li><a href="index.php?page=services" data-tr="Servicios"></a></li>'+
                                    '<li><a  data-tr="Idioma"><i class="fa fa-angle-down"></i></a> '+
                                        '<ul class="submenu">'+
                                            '<li><a href="#" data-tr="Espanyol" id="btn-es" name="btn-es"></a></li>'+
                                            '<li><a href="#" data-tr="Ingles" id="btn-en" name="btn-en"></a></li>'+
                                            '<li><a href="#" data-tr="Valenciano" id="btn-va" name="btn-va"></a></li>'+
                                        '</ul>'+
                                    '</li>'+
                                    '<li><a href="index.php?page=controller_login&op=list_login" data-tr="Entrar"></a></li>'+
                                '</ul>'+
                            '</nav>'
                );

            break;
        }
    }
});