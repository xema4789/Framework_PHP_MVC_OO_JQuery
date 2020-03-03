$(document).ready(function(){

    // Pintar carousel
    $.ajax({
                url:"module/inicio/controller/controller_home.php?op=list_ciudades_valoracion",
                type: 'GET',
                dataType: 'json',
                    
        }).done(function(data){
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
    }).fail(function(){
        console.log("atontao");
    })

    //Fin pintar carousel

    // Pintar categorias
    $.ajax({
        url:"module/inicio/controller/controller_home.php?op=list_tipos",
        type: 'GET',
        dataType: 'json',
                    
        }).done(function(data){
                
        // console.log("oleee los caracoles");


        for (row in data){
            $('<div></div>').attr({'class':"categoria",'id':data[row].Tipo}).appendTo('.ciudades').html (
                '<img src="'+data[row].Imagen+'" href="#" alt="No se puede cargar la imagen">'
                 );
        }
    }).fail(function(){
                console.log("atontao");
    })

    //Fin pintar categorias

    //Pintar ciudades
    $.ajax({
        url:"module/inicio/controller/controller_home.php?op=list_ciudades",
        type: 'GET',
        dataType: 'json',
                    
        }).done(function(data){
                
        // console.log("oleee los caracoles");


        for (row in data){
            $('<div></div>').attr({'class':"ciudad_home",'id':data[row].Ciudad}).appendTo('.ciudades_home').html (
                '<img src="'+data[row].imagen+'" class="imagen_ciudad_home"  href="#" alt="No se puede cargar la imagen" style="z-index:0">'
                 );
        }
    }).fail(function(){
                console.log("atontao");
    })



    //Fin pintar ciudades






    //Cick en la foto y saltar a shop

    $(document).on("click", '.categoria',function(){
        var categoria = this.getAttribute('id');       
        localStorage.setItem('categoria',categoria)
        $callback = 'index.php?page=controller_shop&op=list';
    	window.location.href=$callback; 
    });

    //Fin click y saltar a shop

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



});





//     $('<div></div>').attr('class',"item active").appendTo('.carousel-inner').html (
//         '<img src="view/img/slider1.jpg" alt="Los Angeles">'
//     );
//     $('<div></div>').attr('class',"item").appendTo('.carousel-inner').html (
//        '<img src="view/img/slider2.jpg" alt="r">'
//    );
//    $('<div></div>').attr('class',"item").appendTo('.carousel-inner').html (
//        '<img src="view/img/slider3.jpg" alt="t">'
//    );