$(document).ready(function(){
   
    var consulta="";

    var cont_ciudad=0;
    var cont_valoracion=0;
    var cont_calidad=0;

    let consulta_ciudad="";
    let consulta_valoracion="";
    let consulta_calidad="";

    //Ciudad

    $(document).on("click",'.f_ciudad',function () {
        var ciudad=this.getAttribute('id');
        var cont=this.getAttribute('cont');
        cont++;;
        

        this.setAttribute('cont',cont);

        if(cont==1){//Marcar
            document.getElementById(ciudad).style.backgroundColor="#50C1F0";
            if(cont_ciudad==0){
                consulta_ciudad=" AND h.Ciudad LIKE "+ciudad;
                cont_ciudad++;
                filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
            }else{
                consulta_ciudad= consulta_ciudad+" OR h.Ciudad LIKE "+ciudad;
                cont_ciudad++;
                filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
            }
        }else{//Desmarcar
            cont=0

            document.getElementById(ciudad).style.backgroundColor="transparent";
            this.setAttribute('cont',0);
        }
    });

    //Valoracion

    $(document).on("click",'.f_stars',function () {

        var valoracion=this.getAttribute('id');
        document.getElementById(valoracion).style.backgroundColor="#50C1F0";



        if((cont_valoracion==0) && (cont_calidad==0) ){
            consulta_valoracion=" HAVING h.Valoracion "+valoracion;
            cont_valoracion++;
            filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
        }else if(cont_valoracion==0){
            consulta_valoracion=consulta_valoracion+" AND h.Valoracion "+valoracion;
            cont_valoracion++;
            filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
        }else{
            consulta_valoracion=consulta_valoracion+" OR h.Valoracion "+valoracion;
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
            consulta_calidad=" HAVING h.Tipo_habitacion LIKE "+tipo;
            filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
        }else if(cont_calidad==0){
            cont_calidad++;
            consulta_calidad=consulta_calidad+" AND h.Tipo_habitacion LIKE "+tipo;
            filtrar(consulta_ciudad, consulta_valoracion, consulta_calidad);
        }else{
            cont_calidad++;
            consulta_calidad=consulta_calidad+" OR h.Tipo_habitacion LIKE "+tipo;
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
              mostrar(data);
          }).fail(function(){
            console.log("FAIL");
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


        filtrar(consulta_ciudad,consulta_valoracion,consulta_calidad);

    });
    
    function borrar(elems){
        for (var x = 0; x < elems.length; x++) {
            document.getElementsByClassName(elems[x].style.backgroundColor="transparent");
          }
    }
});