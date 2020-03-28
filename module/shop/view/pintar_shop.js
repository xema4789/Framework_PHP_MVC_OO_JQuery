

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
        console.log("FAIL");
      });
}


function ajax_promise(urlP, typeP, dataTypeP){
    return new Promise((resolve, reject)=>{
        $.ajax({
            url:urlP,
            type:typeP,
            dataType: dataTypeP,
                
          }).done(function(data){
            resolve(data);
          }).fail(function(){
            console.log("FAIL");
            reject("FAIL");
          });
    }); 
}

$(document).ready(function(){

    localStorage.setItem('posicion',0);
    

    
    
 
    //Recibiendo informacion de localstorage
    var num_habitacion = localStorage.getItem('num_habitacion');
    var ciudad = localStorage.getItem('ciudad');
    var categoria = localStorage.getItem('categoria');
    var comida=localStorage.getItem('comida');
    localStorage.removeItem('num_habitacion');
    localStorage.removeItem('ciudad');
    localStorage.removeItem('categoria');
    localStorage.removeItem('comida');

    ////

    console.log(ciudad);

    if((!ciudad) && (!categoria) && (!num_habitacion) && (!comida)){
        //Vengo del menu, pintar todas las habitaciones
        console.log("pintar todo");
        // listar_scroll();
        pintar_paginacion();
        pintar_filtros();
        pintar_tipos();
    }else if(((ciudad)&&(ciudad!="%")) && ((!categoria)||(categoria=="%")) && ((!comida)||(comida=="%"))){
        //Pintar ciudades 
        ajaxForSearch("module/shop/controller/controller_shop.php?op=list_ciudades&ciudad=" + ciudad,"mostrar");

    }else if(((categoria)&&(categoria!="%")) && ((!ciudad)||(ciudad=="%")) && ((!comida)||(comida=="%"))){
        ajaxForSearch("module/shop/controller/controller_shop.php?op=list_categorias&cat=" + categoria,"mostrar");
        categoria=null;
        //Pintar categorias
    }else if(((ciudad)&&(ciudad!="%")) && ((categoria)&&(categoria!="%")) && ((!comida)||(comida=="%"))){
        //Pintar por categoria y ciudad
        ajaxForSearch("module/shop/controller/controller_shop.php?op=list_ciudad_tipos&cat=" + categoria+"&ciudad=" + ciudad,"mostrar");

    }else if(num_habitacion){
        ajaxForSearch("module/shop/controller/controller_shop.php?op=list_habitacion&hab=" + num_habitacion,"rellenar");
        num_habitacion=null;
    }else if(((!categoria)||(categoria=="%")) && ((!ciudad)||(ciudad=="%")) && ((comida)&&(comida!="%"))){
        //Pintar comida
        ajaxForSearch("module/shop/controller/controller_shop.php?op=list_comida&comida=" + comida,"mostrar");
    }else if(((!categoria)||(categoria=="%")) && ((ciudad)&&(ciudad!="%")) && ((comida)&&(comida!="%"))){
        //Pintar comida y ciudad
        ajaxForSearch("module/shop/controller/controller_shop.php?op=list_comida_ciudad&comida=" + comida+"&ciudad="+ciudad,"mostrar");
    
    }else if(((categoria)&&(categoria!="%")) && ((ciudad)&&(ciudad!="%")) && ((comida)&&(comida!="%"))){
        //Pinta comida ciudad y categoria
        ajaxForSearch("module/shop/controller/controller_shop.php?op=list_comida_ciudad_categoria&comida=" + comida+"&ciudad="+ciudad+"&categoria="+categoria,"mostrar");
    
    
    }else if(((categoria)&&(categoria!="%")) && ((!ciudad)||(ciudad=="%")) && ((comida)&&(comida!="%"))){
        //Pintar comida y categoria
        ajaxForSearch("module/shop/controller/controller_shop.php?op=list_comida_categoria&comida=" + comida+"&categoria="+categoria,"mostrar");
    
    
    
    
    }else{
        alert("Error en los filtros");
        pintar_paginacion();
        // listar_scroll();
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
                        '<li class="f_calidad" id="\'Asiatica\'">Asiática</li>'+  
                    '</ul>'+
                '</li>'+
            '</ul>'+
            '<td><input type="button" name="f_buton" id="f_reiniciar" value="Reset" onclick=""</td>'

        );
    }
    


    //Fin pintar los filtros



    function pintar_paginacion(){
        // var productos="module/shop/controller/controller_shop.php?op=list_habitaciones";
        var count="module/shop/controller/controller_shop.php?op=contar";
        $.ajax({
            url:count,
            type: 'GET',
            dataType: 'json',
                
          }).done(function(data){
            let totalItems=0;
            let totalPages=0;

            let prevPage=false;
            let nextPage=false;

            let total=data[0].total;
            
            for(let i=0; i < total;i++){
                if((i % 9)==0){
                    totalPages = totalPages +1;
                }
            }

            if(totalPages > 1){
                prevPage = 'Prev';
                nextPage = 'Next';
            }

            $('#articulo').bootpag({
                total: totalPages,
                page: 1,
                maxVisible: totalPages,
                prev: prevPage,
                next: nextPage
            }).on("page",function(event,num){
      
                console.log(num);

                totalItems = 9 *(num-1);

                // alert(totalItems);


                pintar_shop(totalItems);
                
            });
            pintar_shop(totalItems);


          }).fail(function(){
            console.log("FAIL PAGINACION");
        });
    }




    function pintar_shop(total_items){
        $.ajax({
            url:"module/shop/controller/controller_shop.php?op=list_paginacion&posicion="+total_items,
            type: 'GET',
            dataType: 'json',
                
          }).done(function(data){
            console.log("hola");
            console.log(data);
            mostrar(data);
           
          }).fail(function(){
            console.log("FAIL");
          });


    }




//Distintas funciones



$(document).on("click","#mas",function(){
    listar_scroll();
});


function listar_scroll(){  

    num=localStorage.getItem('posicion');
    if(num==0){
        localStorage.setItem('posicion',2);
    }else{

        sumar=num;
        sumar++;
        sumar++;
        sumar++;
        localStorage.setItem('posicion',sumar);
    }

    $.ajax({
        url:"module/shop/controller/controller_shop.php?op=listar_scroll&num="+num,
        type: 'GET',
        dataType: 'json',
            
      }).done(function(data){
          mostrar(data);
      }).fail(function(){
        console.log("FAIL");
    });
}



//     window.addEventListener("scroll", function(){
//         if(($(window).scrollTop())==(($(document).height())-($(docuemnt).width()))){
//         }
// });







//Click en la foto
    $(document).on("click", '.foto',function(){
        var id = this.getAttribute('id');
    $.ajax({
        url:"module/shop/controller/controller_shop.php?op=list_modal&hab=" + id,
        type: 'GET',
        dataType: 'json',
            
      }).done(function(data){
        
       rellenar(data);
      
            //  modal();
      }).fail(function(){
        console.log("FAIL");
    });
});

 //Fin click en la foto


//Sumar visita
 function sumar_visita(tipo){
    $.ajax({
        url:"module/shop/controller/controller_shop.php?op=sumar_visita&tipo="+tipo,
        type: 'GET',
        dataType: 'json',
                    
        }).done(function(data){
            //done

    }).fail(function(){
                console.log("FAIL");
    })
    
}
//Fin sumar visita

//Fin funciones





//Pintando diferentes cosas

function pintar_tipos(){
    $.ajax({
        url:"module/inicio/controller/controller_home.php?op=list_tipos",
        type: 'GET',
        dataType: 'json',
                    
        }).done(function(data){


        for (row in data){
            $('<div></div>').attr({'class':"foto",'id':data[row].Tipo}).appendTo('.ciudades').html (
                '<img src="'+data[row].Imagen+'" href="#" alt="No se puede cargar la imagen" style="z-index:0">'
                 );
        }
    }).fail(function(){
                console.log("FAIL");
    })
}

 //Rellenar shop

function rellenar(data){
    
    sumar_visita(data[0].Tipo_habitacion);

    $('.shop').empty();
   
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
            '<br><li><span class="lista">Numero de habitacion: <span id="num_habitacion">'+data[row].Numero_habitacion+'</span></span></li></br>'+
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

//Click en like
$(document).on("click",".foto_like",function(){
    // alert("Click en like");
    // console.log("click");
    // console.log(this.id);
    var id=this.getAttribute('id');
    console.log("id principio:"+id);
    // id=null;


    //Llamar al dao y que busque si está, si no lo está hace un insert, y si lo está hace un delete (posible promesa)

    $.ajax({
        url:"module/shop/controller/controller_shop.php?op=busca_like&id="+id,
        type: 'GET',
        dataType: 'json',
            
      }).done(function(data){
          console.log("data :"+data);
         if(data=="vacio"){
            console.log("insertar en la bd");
            //Insert porque no tiene like
            //ajax promise

        }else if(data=="lleno"){
            console.log("Borrar de la bd");
            //Delete porque ya tiene like
            //ajax_promise
        }else{
            alert("Error");
        }
      }).fail(function(){
        console.log("FAIL");
      });


    // ajax_promise("module/shop/controller/controller_shop.php?op=busca_like&id="+id,'GET','json').then(function(data){
    //     console.log("data: " +data);

    //     if(data=="lleno"){
    //         console.log("Borrar de la bd");
    //         //Delete porque ya tiene like
    //         //ajax_promise
    //     }else{
    //         console.log("insertar en la bd");
    //         //Insert porque no tiene like
    //         //ajax promise

    //     }

    // });


});

//Fin click en like




//Mostrar habitaciones
function mostrar(data){
    $('<div></div>').attr('id','contenedor').appendTo('#articulo');
    $('#contenedor').empty();


    for (row in data){
        $('<div></div>').attr({'class':"foto",'id':data[row].Numero_habitacion}).appendTo('#contenedor').html (
            '<img src="'+data[row].imagen+'" class="foto_shop" href="#" alt="No se puede cargar la imagen">'+
            '<p class="texto_imagen">'+data[row].Ciudad+'</p>'+
            '<p class="texto_visitas">'+data[row].visitas+'</p>'+
            '<p class="texto_ojo"></p>'
            );
            

            $('<div></div>').attr({'class':"foto_like",'id':data[row].Numero_habitacion}).appendTo('#contenedor').html (
                '<p class="like_foto" id="'+data[row].Numero_habitacion+'"></p>'
                );




        //     $('<div></div>').attr({'class':"like",'id':data[row].Numero_habitacion}).appendTo('#contenedor').html (
        //     '<div id="corazon" class="'+data[row].Numero_habitacion+'">'+
        //     '<div id="main-content">'+
        //       '<div>'+
        //         '<input type="checkbox" id="checkbox" />'+
        //         '<label for="checkbox">'+
        //           '<svg id="heart-svg" viewBox="467 392 58 57" xmlns="http://www.w3.org/2000/svg">'+
        //             '<g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">'+
        //               '<path d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z" id="heart" fill="#AAB8C2"/>'+
        //               '<circle id="main-circ" fill="#E2264D" opacity="0" cx="29.5" cy="29.5" r="1.5"/>'+
            
        //               '<g id="grp7" opacity="0" transform="translate(7 6)">'+
        //                 '<circle id="oval1" fill="#9CD8C3" cx="2" cy="6" r="2"/>'+
        //                 '<circle id="oval2" fill="#8CE8C3" cx="5" cy="2" r="2"/>'+
        //               '</g>'+
            
        //               '<g id="grp6" opacity="0" transform="translate(0 28)">'+
        //                 '<circle id="oval1" fill="#CC8EF5" cx="2" cy="7" r="2"/>'+
        //                 '<circle id="oval2" fill="#91D2FA" cx="3" cy="2" r="2"/>'+
        //               '</g>'+
            
        //               '<g id="grp3" opacity="0" transform="translate(52 28)">'+
        //                 '<circle id="oval2" fill="#9CD8C3" cx="2" cy="7" r="2"/>'+
        //                 '<circle id="oval1" fill="#8CE8C3" cx="4" cy="2" r="2"/>'+
        //               '</g>'+
            
        //               '<g id="grp2" opacity="0" transform="translate(44 6)">'+
        //                 '<circle id="oval2" fill="#CC8EF5" cx="5" cy="6" r="2"/>'+
        //                 '<circle id="oval1" fill="#CC8EF5" cx="2" cy="2" r="2"/>'+
        //               '</g>'+
            
        //               '<g id="grp5" opacity="0" transform="translate(14 50)">'+
        //                 '<circle id="oval1" fill="#91D2FA" cx="6" cy="5" r="2"/>'+
        //                 '<circle id="oval2" fill="#91D2FA" cx="2" cy="2" r="2"/>'+
        //               '</g>'+
            
        //               '<g id="grp4" opacity="0" transform="translate(35 50)">'+
        //                 '<circle id="oval1" fill="#F48EA7" cx="6" cy="5" r="2"/>'+
        //                 '<circle id="oval2" fill="#F48EA7" cx="2" cy="2" r="2"/>'+
        //               '</g>'+
            
        //               '<g id="grp1" opacity="0" transform="translate(24)">'+
        //                 '<circle id="oval1" fill="#9FC7FA" cx="2.5" cy="3" r="2"/>'+
        //                 '<circle id="oval2" fill="#9FC7FA" cx="7.5" cy="2" r="2"/>'+
        //               '</g>'+
        //             '</g>'+
        //           '</svg>'+
        //         '</label>'+
            
              
        //       '</div>'+
        //     '</div>'+
        //   '</div>');


            

            // $('<p>'+data[row].Ciudad+'</p>').attr('class',"texto_imagen").appendTo('.tipos').html ();
    }
}
            
    
//Fin mostrar habitaciones

});