$(document).ready(function(){
    cargar_api();

    localStorage.setItem('posicion_home',0);

    function ajaxForSearch(url,tipo){
        $.ajax({
            url:url,
            type: 'GET',
            async: false,
            dataType: 'json',
                
          }).done(function(data){

            switch(tipo){
                case 1:
                    pintar_carousel(data);
                break;
                case 2:
                    pintar_categorias(data);
                break;
                case 3:
                    pintar_ciudades(data);
                break;
                case 4:
                    pintar_categorias_visitadas(data);
                break;
            }
          }).fail(function(){
            console.log("FAIL");
          });
    }


    // Pintar carousel

    ajaxForSearch("module/inicio/controller/controller_home.php?op=list_ciudades_valoracion",1);
    function pintar_carousel(data){
        for (row in data){
            if(row==0){
                 $('<div></div>').attr({'class':"item active",'id':data[row].Numero_habitacion}).appendTo('.carousel-inner').html (
                    '<img src="'+data[row].imagen+'" class="img_carousel" alt="No se puede cargar la imagen" style="z-index:0">'
                    );

                    $('<p>'+data[row].Valoracion+'</p>').attr('class',"texto_valoracion").appendTo('.item').html ();
                    
            }else{
                $('<div></div>').attr({'class':"item",'id':data[row].Numero_habitacion}).appendTo('.carousel-inner').html (
                    '<img src="'+data[row].imagen+'" class="img_carousel" alt="No se puede cargar la imagen" style="z-index:0">'
                    );
            }
        }
    }
    //Fin pintar carousel


    // Pintar categorias
    ajaxForSearch("module/inicio/controller/controller_home.php?op=list_tipos",2);
    function pintar_categorias(data){
        for (row in data){
            $('<div></div>').attr({'class':"categoria",'id':data[row].Tipo}).appendTo('.ciudades').html (
                '<img src="'+data[row].Imagen+'" href="#" alt="No se puede cargar la imagen">'
                 );
        }
    }
    //Fin pintar categorias


    

    //Pintar ciudades
    ajaxForSearch("module/inicio/controller/controller_home.php?op=list_ciudades",3);
    function pintar_ciudades(data){
        for (row in data){
            $('<div></div>').attr({'class':"ciudad_home",'id':data[row].Ciudad}).appendTo('.ciudades_home').html (
                '<img src="'+data[row].imagen+'" class="imagen_ciudad_home"  href="#" alt="No se puede cargar la imagen" style="z-index:0">'
                 );
        }
    }
    //Fin pintar ciudades

    // Categorias mas visitadas
    var num=localStorage.getItem('posicion_home');
    ajaxForSearch("module/inicio/controller/controller_home.php?op=list_visitas&num="+num,4);
    function pintar_categorias_visitadas(data){
        for(row in data){
            $('<div></div>').attr({'class':"categoria_visitas",'id':data[row].Tipo_habitacion}).appendTo('.visitas_home').html (
                '<img src="'+data[row].imagen+'" class="imagen_categoria_visitas"  href="#" alt="No se puede cargar la imagen" style="z-index:0">'+
                '<p class="texto_imagen">'+data[row].Tipo_habitacion+'</p>'
                );
        }
    }

// Categorias mas visitadas


$(document).on("click","#mas",function(){
    listar_scroll();
});


function listar_scroll(){  

    num=localStorage.getItem('posicion_home');
    console.log(num);
    if(num==0){
        localStorage.setItem('posicion_home',2);
    }else{

        sumar=num;
        sumar++;
        sumar++;
        sumar++;
        localStorage.setItem('posicion_home',sumar);
    }
    ajaxForSearch("module/inicio/controller/controller_home.php?op=list_visitas&num="+num,4);
}





 




    //Cick en categoria y saltar a shop

    $(document).on("click", '.categoria',function(){
        var categoria = this.getAttribute('id');       
        busca_categoria(categoria);
    });

    //Fin click en categoria y saltar a shop

    //Click en categorias mas visitadas
    $(document).on("click",'.categoria_visitas',function(){
        var categoria = this.getAttribute('id');       
        busca_categoria(categoria);
    });

    //Fin en click categorias mas visitadas





    function busca_categoria(categoria){


        localStorage.setItem('categoria',categoria)
        $callback = 'index.php?page=controller_shop&op=list';
    	window.location.href=$callback; 
    }

    //Click en la foto de carousel y saltar a home
    $(document).on("click", '.item',function(){
        var num = this.getAttribute('id');
        console.log(num);
        localStorage.setItem('num_habitacion',num)
        $callback = 'index.php?page=controller_shop&op=list';
    	window.location.href=$callback; 
    });

    //Fin click en carousel


    //Click en ciudad y saltar a shop
    $(document).on("click", '.ciudad_home',function(){
        var ciu = this.getAttribute('id');
        console.log(ciu);
        localStorage.setItem('ciudad',ciu)
        $callback = 'index.php?page=controller_shop&op=list';
    	window.location.href=$callback; 
    });


    //Fin click en ciudades

// Prueba de apis

function cargar_api(){
    $.ajax({
        url:"https:www.googleapis.com/books/v1/volumes?q=rocky%20balboa",
        type: 'GET',
        dataType: 'json',
            
      }).done(function(data){
        console.log(data.items[0].volumeInfo.title);
        console.log(data.items[0].volumeInfo.imageLinks.thumbnail);


        for(i=0;i<6;i++){
            $('<div></div>').attr('class',"libro").appendTo('#libros').html (
                '<img src="'+data.items[i].volumeInfo.imageLinks.thumbnail+'" alt="No se puede cargar la imagen"></img >'+
                '<p>'+data.items[i].volumeInfo.title+'</p>'
            );
        }

        
        
      }).fail(function(){
        console.log("FAIL");
      });
}






// Fin prueba de apis






});

