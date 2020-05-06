$(document).ready(function(){
    console.log("ole los caracoles login");

    pintar_login('login');

    $.ajax({//Este ayax pinta el menu
        url:amigable("?module=login&function=ver_usuario"), 
        type:'GET',
        dataType: 'json',
            
      }).done(function(data){
         
        if(data!="no"){
            console.log("usuario encontrado");
            console.log(data);
            console.log(data['type']);
            var tipo=data['type'];
            var nombre=data['user'];
            pintar_menu(tipo,nombre);

        }else{
            
            console.log("usuario no encontrado");
            pintar_menu();
        }





      }).fail(function(){
      
        console.log("FAIL");
        pintar_menu();  //De momento me entra aqui porque me está fallando algo y no se el que, pero la funcionalidad si no estas logueado es la misma y el usuario no se entera
      });

    $('#lo_register').on("click",function(){
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
                    '<input type="submit" value="Registrarse" class="btn" id="re_register"></input>'+
                '</tr>'+
                '</fieldset>'
                );
            break;

            case 'login':
                $('.login').empty();
                $('<div></div>').attr('class',"op_login").appendTo('.login').html (
                    '<input type="submit" value="Acceder" name="lo_login" class="btn" id="lo_login"></input>'+
                        '<div class="autocomplete"> '+
                        '<input id="lo_user" name="lo_user" placeholder="Nombre" type="text" />'+
                        '<a id="error_lo_user" class="error"></a><br>'+
                        '<input name="lo_password" id="lo_password" placeholder="Contraseña" type="password" />'+ 
                        '<a id="error_lo_password" class="error"></a><br>'+
                    '</div>'+
                    '<a id="lo_register">Registrate</a>'
                );
            break;
        }

    }


    function pintar_menu(tipo,nombre){
     
        
        
        switch(tipo){
            
            case 'admin':
                // main-menu
                $('<div></div>').attr('class',"op_menu").appendTo('.main-menu').html (
                    '<nav>'+
									'<ul>'+
                                        '<li class="active"><a href="index.php?page=controller_home&op=list">Inicio<i class="fa fa-angle-down"></i></a>'+
                                        '<ul class="submenu">'+
                                            '<li><a href="index.html">No entrar</a></li>'+
                                            '<li><a href="index-2.html">No entrar</a></li>'+
                                            '<li><a href="index.php?page=controller_home&op=list">La buena</a></li>'+
                                        '</ul>'+
                                    '</li>'+
										'<li><a href="index.php?page=aboutus">Conocenos</a></li>'+
										'<li><a href="index.php?page=services">Servicios</a></li>'+
										'<li><a><i class="fa fa-angle-down">Idioma</i></a> '+
											'<ul class="submenu">'+
												'<li><a href="#" id="btn-es" name="btn-es">Espanyol</a></li>'+
												'<li><a href="#" id="btn-en" name="btn-en">Ingles</a></li>'+
												'<li><a href="#" id="btn-va" name="btn-va">Valenciano</a></li>'+
											'</ul>'+
										'</li>'+
										'<li><a href="index.php?page=controller_shop&op=list">Tienda</a></li>'+
										'<li><a><i class="fa fa-angle-down">Hotel</i></a> '+
											'<ul class="submenu">'+
												'<li><a href="index.php?page=controller_user&op=list">Administracion</a></li>'+
												'<li><a href="index.php?page=controller_order&op=list">Usuarios</a></li>'+
												'<li><a href="blog-details.html">En construccion</a></li>'+
											'</ul>'+
										'</li>'+
										'<li><a href="index.php?page=controller_contact&op=list">Contacto</a></li>'+
                                        '<li class="active"><a>'+nombre+'<i class="fa fa-angle-down"></i></a>'+
                                        '<ul class="submenu">'+
                                            '<li><a id="desconectar" href="index.php?page=controller_login&op=log_out">Desconectarse</a></li>'+
                                        '</ul>'+
									'</ul>'+
								'</nav>'
                    );
            break;

            case 'user':
                $('<div></div>').attr('class',"op_menu").appendTo('.main-menu').html (
                    '<nav>'+
									'<ul>'+
										'<li class="active"><a href="index.php?page=controller_home&op=list">Inicio<i class="fa fa-angle-down"></i></a>'+
											'<ul class="submenu">'+
												'<li><a href="index.html">No entrar</a></li>'+
												'<li><a href="index-2.html">No entrar</a></li>'+
												'<li><a href="index.php?page=controller_home&op=list">La buena</a></li>'+
											'</ul>'+
										'</li>'+
										'<li><a href="index.php?page=aboutus">Conocenos</a></li>'+
										'<li><a href="index.php?page=services">Servicios</a></li>'+
										'<li><a>Idioma<i class="fa fa-angle-down"></i></a> '+
											'<ul class="submenu">'+
												'<li><a href="#" id="btn-es" name="btn-es">Espanyol</a></li>'+
												'<li><a href="#" id="btn-en" name="btn-en">Ingles</a></li>'+
												'<li><a href="#" id="btn-va" name="btn-va">Valenciano</a></li>'+
											'</ul>'+
										'</li>'+
										'<li><a href="index.php?page=controller_shop&op=list">Tienda</a></li>'+
										'<li><a href="index.php?page=controller_contact&op=list">Contacto</a></li>'+
										'<li class="active"><a>'+nombre+'<i class="fa fa-angle-down"></i></a>'+
                                        '<ul class="submenu">'+
                                        '<li><a id="desconectar" href="index.php?page=controller_login&op=log_out">Desconectarse</a></li>'+
                                        '</ul>'+
									'</ul>'+
								'</nav>'
                    );

            break;

            default://No está logueado
            $('<div></div>').attr('class',"op_menu").appendTo('.main-menu').html (
                '<nav>'+
                                '<ul>'+
                                    '<li class="active"><a href="index.php?page=controller_home&op=list">Inicio<i class="fa fa-angle-down"></i></a>'+
                                        '<ul class="submenu">'+
                                            '<li><a href="index.html">No entrar</a></li>'+
                                            '<li><a href="index-2.html">No entrar</a></li>'+
                                            '<li><a href="index.php?page=controller_home&op=list">Buena</a></li>'+
                                        '</ul>'+
                                    '</li>'+
                                    '<li><a href="index.php?page=aboutus">Conocenos</a></li>'+
                                    '<li><a href="index.php?page=services">Servicios</a></li>'+
                                    '<li><a>Idioma<i class="fa fa-angle-down"></i></a> '+
                                        '<ul class="submenu">'+
                                            '<li><a href="#" id="btn-es" name="btn-es">Espanyol</a></li>'+
                                            '<li><a href="#" id="btn-en" name="btn-en">Ingles</a></li>'+
                                            '<li><a href="#" id="btn-va" name="btn-va">Valenciano</a></li>'+
                                        '</ul>'+
                                    '</li>'+
                                    '<li><a href="'+amigable("?module=login&function=list_login")+'">Entrar</a></li>'+
                                    '<li><a href="'+amigable("?module=shop&function=list_shop")+'">Tienda</a></li>'+
                                    '<li><a href="'+amigable("?module=contact&function=list_contact")+'">Contacto</a></li>'+
                                '</ul>'+
                            '</nav>'
                );

            break;
        }
    }
});