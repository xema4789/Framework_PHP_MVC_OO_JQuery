$(document).ready(function(){
   
    var consulta="";

    var cont_ciudad=0;
    var cont_valoracion=0;
    var cont_calidad=0;


    var ciudad_clicks=2;
    var valoracion_clicks=2;
    var calidad_clicks=2;

    let consulta_ciudad="";
    let consulta_valoracion="";
    let consulta_calidad="";

    // checks = checks.replace("categoria = CAmisetablabla","");


    //Botones id a los que hacer click: f_ciudad   f_stars     f_calidad

    //Ciudad

    $(document).on("click",'.f_ciudad',function () {
        var ciudad=this.getAttribute('id');
        var cont=this.getAttribute('cont');
        // alert(cont);
        cont++;
        

        this.setAttribute('cont',cont);

       

        if(cont%2==1){//Marcar
            document.getElementById(ciudad).style.backgroundColor="#50C1F0";

            if(cont_ciudad==0){
                consulta_ciudad=" AND Ciudad LIKE "+ciudad;
                cont_ciudad++;
                filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
            }else{
                consulta_ciudad= consulta_ciudad+" OR Ciudad LIKE "+ciudad;
                cont_ciudad++;
                filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
            }
        }else{//Desmarcar
            document.getElementById(ciudad).style.backgroundColor="transparent";
            this.setAttribute('cont',0);
        }


        
        


        

        
        
        
    });

//document.getElementById(ciudad).style.backgroundColor="#50C1F0";



    // var ciudad=this.getAttribute('id');
    //     ciudad_clicks++;



    //     if((ciudad_clicks%2)==1){ //Si es impar añadir consulta
    //         document.getElementById(ciudad).style.backgroundColor="#50C1F0";


    //         if((count == 0) && (cont_ciudad==0)){                                                     // }else if(cont_ciudad==0){       
    //             checks = " AND Ciudad LIKE "+ciudad;                                                  //    checks = checks + ' AND Ciudad LIKE '+ciudad;
    //             count=count+1;                                                                        //      cont_ciudad=cont_ciudad+1;
    //             cont_ciudad=cont_ciudad+1;                                                            //      filtrar(checks,checks2);
    //             filtrar(checks,checks2);
    //         }else{
    //             cont_ciudad++;
    //             checks = checks + " OR Ciudad LIKE "+ciudad;
    //             filtrar(checks,checks2);
    //         }
    //     }else{//Si es par quitamos la consulta
    //         document.getElementById(ciudad).style.backgroundColor="transparent";
    //         // checks = checks.replace("WHERE Ciudad LIKE "+ciudad,"");
    //         checks = checks.replace(" AND Ciudad LIKE "+ciudad,"");
    //         checks = checks.replace(" OR Ciudad LIKE "+ciudad,"");

    //         alert(checks);
    //     }

    //Fin ciudad

    //Valoracion

    $(document).on("click",'.f_stars',function () {

        var valoracion=this.getAttribute('id');
        document.getElementById(valoracion).style.backgroundColor="#50C1F0";



        if((cont_valoracion==0) && (cont_calidad==0) ){
            consulta_valoracion=" HAVING Valoracion "+valoracion;
            cont_valoracion++;
            filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
        }else if(cont_valoracion==0){
            consulta_valoracion=consulta_valoracion+" AND Valoracion "+valoracion;
            cont_valoracion++;
            filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
        }else{
            consulta_valoracion=consulta_valoracion+" OR Valoracion "+valoracion;
            cont_valoracion++;
            filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
        }
       
       
    });

    //Fin valoracion

    //Calidad

    $(document).on("click",'.f_calidad',function () {

        var tipo=this.getAttribute('id');
        document.getElementById(tipo).style.backgroundColor="#50C1F0";

        if((cont_calidad==0)&&(cont_valoracion==0)){
            cont_calidad++;
            consulta_calidad="HAVING Tipo_habitacion LIKE "+tipo;
            filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
        }else if(cont_calidad==0){
            cont_calidad++;
            consulta_calidad=consulta_calidad+"AND Tipo_habitacion LIKE "+tipo;
            filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
        }else{
            cont_calidad++;
            consulta_calidad=consulta_calidad+"OR Tipo_habitacion LIKE "+tipo;
            filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
        }
        
    });

    //Fin calidad

    function filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad){
        consulta=consulta_ciudad+consulta_calidad+consulta_valoracion;
        
        console.log(consulta);

        $.ajax({
            url:"module/shop/controller/controller_shop.php?op=filtrar&consulta=" + consulta,
            type: 'GET',
            dataType: 'json',
                
          }).done(function(data){
              console.log(data);
              mostrar(data);
          }).fail(function(){
            console.log("atontao");
        });
    }


//Pintar las habitaciones filtradas
    function mostrar(data){
        $('.tipos').empty();
        for (row in data){
            $('<div></div>').attr({'class':"foto",'id':data[row].Numero_habitacion}).appendTo('.tipos').html (
                '<img src="'+data[row].imagen+'" class="foto_shop" href="#" alt="No se puede cargar la imagen">'+
                '<p class="texto_imagen">'+data[row].Ciudad+'</p>'
                );
        }
    }


    $(document).on("click","#f_reiniciar",function(){
        consulta_ciudad="";
        consulta_calidad="";
        consulta_valoracion="";

        cont_ciudad=0;
        cont_valoracion=0;
        cont_calidad=0;

        var elems = document.querySelectorAll('.f_ciudad');
        borrar(elems);
        elems = document.querySelectorAll('.f_calidad');
        borrar(elems);
        elems = document.querySelectorAll('.f_stars');
        borrar(elems);




        

        // document.getElementsByClassName(f_ciudad).style.backgroundColor="transparent";

        filtrar(consulta_ciudad,consulta_valoracion,consulta_calidad);

    });

    
    function borrar(elems){
        for (var x = 0; x < elems.length; x++) {
            document.getElementsByClassName(elems[x].style.backgroundColor="transparent");
          }
    }



});