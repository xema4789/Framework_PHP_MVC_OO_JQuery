$(document).ready(function(){
    

    function ajaxForSearch(url,tipo){
        $.ajax({
            url:url,
            type: 'GET',
            dataType: 'json',
                
          }).done(function(data){
            if(tipo==="mostrar"){
                mostrar(data);
            }else if(tipo==="rellenar"){
                rellenar(data);
            }
          }).fail(function(){
            console.log("Atontao");
          });
    }
    
 
    //Recibiendo informacion de localstorage
    var num_habitacion = localStorage.getItem('num_habitacion');
    var ciudad = localStorage.getItem('ciudad');
    var categoria = localStorage.getItem('categoria');
    localStorage.removeItem('num_habitacion');
    localStorage.removeItem('ciudad');
    localStorage.removeItem('categoria');
    ////

    console.log(ciudad);

    if((!ciudad) && (!categoria) && (!num_habitacion)){
        //Vengo del menu, pintar todas las habitaciones
        console.log("pintar todo");
        pintar_todo();
        pintar_filtros();
        pintar_tipos();
    }else if((ciudad) && (!categoria)){
        //Pintar ciudades 
        alert("oleee los caracolees");
        ajaxForSearch("module/shop/controller/controller_shop.php?op=list_ciudades&ciudad=" + ciudad,"mostrar");

    }else if((categoria) && (!ciudad)){
        ajaxForSearch("module/shop/controller/controller_shop.php?op=list_categorias&cat=" + categoria,"mostrar");
        categoria=null;
        //Pintar categorias
    }else if((categoria) && (ciudad)){
        //Pintar por categoria y ciudad
    }else if(num_habitacion){
        ajaxForSearch("module/shop/controller/controller_shop.php?op=list_habitacion&hab=" + num_habitacion,"rellenar");
        num_habitacion=null;
    }else{
        alert("Error en los filtros");
        pintar_todo();
        pintar_tipos();
        pintar_filtros();
    }



    //Pintar los filtros
    function pintar_filtros(){
        $('<div></div>').attr('class',"filtros").appendTo('.filters_container').html (
            '<h1>Filtros</h1>'+
            '<ul>'+
                '<li>Lugar'+
                    '<ul>'+
                        '<li class="f_ciudad" id="\'Madrid\'" cont="0">Madrid</li>'+
                        '<li class="f_ciudad" id="\'Barcelona\'" cont="0">Barcelona</li>'+
                        '<li class="f_ciudad" id="\'Valencia\'" cont="0">Valencia</li>'+
                        '<li class="f_ciudad" id="\'Sevilla\'" cont="0">Sevilla</li>'+
                        '<li class="f_ciudad" id="\'Castilla la mancha\'" cont="0">Castilla la Mancha</li>'+
                        '<li class="f_ciudad" id="\'Galicia\'" cont="0">Galicia</li>'+
                    '</ul>'+
                '</li>'+
                '<li>Valoracion'+
                    '<ul style="list-style:circle;">'+  
                        '<li class="f_stars" id=">9">+9</li>'+
                        '<li class="f_stars" id="BETWEEN 8 AND 9">8-9</li>'+
                        '<li class="f_stars" id="BETWEEN 7 AND 8">7-8</li>'+
                        '<li class="f_stars" id="BETWEEN 6 AND 7">6-7</li>'+
                        '<li class="f_stars" id="BETWEEN 5 AND 6">5-6</li>'+
                        '<li class="f_stars" id="<5">-5</li>'+
                    '</ul>'+
                '</li>'+
                '<li>Calidad'+
                    '<ul style="list-style:circle;">'+
                        '<li class="f_calidad" id="\'Lujo\'">Lujo</li>'+
                        '<li class="f_calidad" id="\'Standart\'">Standart</li>'+
                        '<li class="f_calidad" id="\'Asiatica\'">Asiática</li>'+  //Problema con la id asiatica, error en la bd
                    '</ul>'+
                '</li>'+
            '</ul>'+
            '<td><input type="button" name="f_buton" id="f_reiniciar" value="Reset" onclick=""</td>'

        );
    }
    


    //Fin pintar los filtros

    



//Listar todas las habitaciones
function pintar_todo(){
    $.ajax({
        url:"module/shop/controller/controller_shop.php?op=list_habitaciones",
        type: 'GET',
        dataType: 'json',
            
      }).done(function(data){
          mostrar(data);
      }).fail(function(){
        console.log("atontao");
    });
}
//Fin listar todas las habitaciones

//Click en la foto
    $(document).on("click", '.foto',function(){
        var id = this.getAttribute('id');
        console.log(id);
        

    $.ajax({
        url:"module/shop/controller/controller_shop.php?op=list_modal&hab=" + id,
        type: 'GET',
        dataType: 'json',
            
      }).done(function(data){
        
       rellenar(data);
      
            //  modal();
      }).fail(function(){
        console.log("atontao");
    });
});

 //Fin click en la foto

function pintar_tipos(){
    $.ajax({
        url:"module/inicio/controller/controller_home.php?op=list_tipos",
        type: 'GET',
        dataType: 'json',
                    
        }).done(function(data){
                
        // console.log("oleee los caracoles");


        for (row in data){
            $('<div></div>').attr({'class':"foto",'id':data[row].Tipo}).appendTo('.ciudades').html (
                '<img src="'+data[row].Imagen+'" href="#" alt="No se puede cargar la imagen" style="z-index:0">'
                 );
        }
    }).fail(function(){
                console.log("atontao");
    })
}

 //Rellenar shop

function rellenar(data){

    $('.shop').empty();
    console.log(data);
    console.log(data[0].Numero_habitacion);
   
  $('<div></div>').attr('id','details').appendTo('.shop');
  $('<div></div>').attr('id','details_habitacion','type','hidden').appendTo('#details');
  $('<div></div>').attr('id','container').appendTo('#details_habitacion');
  $('#container').empty();
  $('<div></div>').attr('id','Div2').appendTo('#container');
  $('<div></div>').attr('id','Div1').appendTo('#container');



  for (row in data){
    $("#Div1").html(
        // '<br><span>'+row+' <span id="'+row+'">'+data[row].row+'</span></span></br>'+
            
            '<br><ul></<br'+
            '<br><li><span class="lista">Numero de habitacion <span id="num_habitacion">'+data[row].Numero_habitacion+'</span></span></li></br>'+
            '<br><li><span class="lista">Tipo de habitacion: <span id="tipo_habitacion">'+data[row].Tipo_habitacion+'</span></span></li></br>'+
            '<br><li><span class="lista">Ciudad: <span id="tipo_habitacion">'+data[row].Ciudad+'</span></span></li></br>'+
            '<br><li><span class="lista">Tipo de comida: <span id="tipo_comida">'+data[row].Tipo_comida+'</span></span></li></br>'+
            '<br><li><span class="lista">Piscina: <span id="piscina">'+data[row].Piscina+'</span></span></li></br>'+
            '<br></ul></br>'+
            '<br><ul></<br'+
            '<br><li><span class="lista">Mayordomo: <span id="mayordomo">'+data[row].Mayordomo+'</span></span></li></br>'+
            '<br><li><span class="lista">Contraseña: <span id="pass">'+data[row].Contrasenya+'</span></span></li></br>'+
            '<br><li><span class="lista">Email: <span id="email">'+data[row].email+'</span></span></li></br>'+
            '<br><li><span class="lista">Fecha de entrada: <span id="f_ini">'+data[row].Fecha_entrada+'</span></span></li></br>'+
            '<br><li><span class="lista">Fecha de salida: <span id="f_fin">'+data[row].Fecha_salida+'</span></span></li></br>'+
            '<br><li><a href="index.php?page=controller_shop&op=list">Atrás</a></li></br>'+
            '<br></ul></br>'
        );
        $("#Div2").html(
            '<br><img id="imagen" src="'+data[row].imagen+'"></img></br>'
        );
    }
}
       
//Fin rellenar shop

//Mostrar habitaciones
function mostrar(data){



    for (row in data){
        $('<div></div>').attr({'class':"foto",'id':data[row].Numero_habitacion}).appendTo('.tipos').html (
            '<img src="'+data[row].imagen+'" class="foto_shop" href="#" alt="No se puede cargar la imagen">'+
            '<p class="texto_imagen">'+data[row].Ciudad+'</p>'
            );

            // $('<p>'+data[row].Ciudad+'</p>').attr('class',"texto_imagen").appendTo('.tipos').html ();
    }
}
            
    
//Fin mostrar habitaciones


















function modal(){
    //alert ("dentro del modal");
    $("#details_habitacion").show();
    $("#modalcontent").dialog({

        width: 850, //ancho
        height: 500, //alto
        //show: "scale", //<!-- ----------- animación de la ventana al aparecer -->
                    //hide: "scale", <!-- ----------- animación al cerrar la ventana -->
        resizable: "false", //fija o redimensionable si ponemos este valor a "true"
                    //position: "down",<!--  ------ posicion de la ventana en la pantalla (left, top, right...) -->
        modal: "true", //si está en true bloquea la pagina entera hasta que lo cerremos, muy elegante dice  on("click",function(){
        buttons:{
            //Aqui poner botones de delete y de update en el futuro
            Ok: function(){
            $(this).dialog("close");
            }
        },
        show: {
            effect: "scale",
            duration: 500
        },
        hide:{
            effect: "scale",
            duration: 500
        }


        // open: function() {
        //     $(".ui-dialog-buttonset").prepend("<span class='ui-button ' >Numero de habitacion:<input type='number' name='quantity' id='quantity' class='quantity' min='1' max='20' step='1'value='1'></span>");
        // },
        // title:data,
        // //width: 500, 
        // height: 570, 
        // resizable: "false",
        // modal: "true", 
        // buttons: {
        //     Reservar: function(){ addToCart();$(this).dialog("close");},//$(this).dialog("close")
        //     Ok: function () {
        //         $(this).dialog("close");
        //     }
        // },
        // show: {
        //     effect: "fade",
        //     duration: 1000
        // },
        // hide: {
        //     effect: "fade",
        //     duration: 1000
        // }
    });
}











});