
    function saltar_shop(){
        callback = 'index.php?page=controller_shop&op=list';
    	    window.location.href=callback;
    }


    

   

$(document).ready(function(){ 
    
    function ajaxForSearch(url){

        $.ajax({
            url:url,
            type: 'GET',
            dataType: 'json',
                
        }).done(function(data){
            return data;
        }).fail(function(){
            console.log("FAIIL");
        });
    }

    

    
    //Cargar combos
    listar_ciudades();
    listar_tipos();






    $("#Ciudad").on("change", function () {

        var ciudad = $(this).val();
        var tipo = $('#Tipo').val();
     


        var url="module/search/controller/controller_search.php?op=list_ciudades&ciudad=" + ciudad;
        data=ajaxForSearch(url);
        console.log(data);

    });



    $("#autocom").on("keyup", function () {                             
        var auto=$(this).val();///valor de lo que estamos escribiendo
        var drop2=$("#Tipo").val();// valor de tipo de habitacion
        var drop1=$("#Ciudad").val();// valor de la ciudad
        var autCom = {auto: auto, drop1: drop1, drop2:drop2}; 


       
        

        $.ajax({
            type: "POST",
            url: "module/search/controller/controller_search.php?op=autocomplete",  
            dataType: 'json',
            data: autCom    // data: autCom,  dataType: 'json'
        })
        .done(function( data, textStatus, jqXHR ) {
            $('#optionsauto').empty();
            
            $('#optionsauto').fadeIn(1000);
            

            for(row in data){
                console.log("hola");
                $('<div></div>').attr({'class':'autoelement',"id":data[row].Tipo_comida}).appendTo('#optionsauto').html(
                    '<a  class="element" data="'+row['Ciudad']+'" id="'+row['Tipo_comida']+'">'+data[row].Ciudad+', '+data[row].Tipo_comida+' </a>',
                );
            }

            // $('#optionsauto').fadeIn(1000).html(data);// se ve

            // for(row in data){
            //     $('#optionsauto').fadeIn(1000).html(data[row]);// se ve

            //     <div class="autoelement">
            //              <a  class="element" data="'.$row['Ciudad'].'" id="'.$row['Tipo_comida'].'">'.utf8_encode($row['Ciudad']).'</a>
            //     </div>;
            // }
           
            ///si selecciono valor
            $('.autoelement').on('click', function(){
                var id = $(this).attr('id');
                console.log(id);

                var id2=$(this).attr('id');
                console.log(id2);


                $('#autocom').val(id);
                //$('#autocom').val($('#'+id).attr('data'));
                $('#optionsauto').fadeOut(1000);
            });
            ///si click fuera se borra value y se cierra
            $("#contenido, .slider__img").on('click', function(){
                $('#optionsauto').fadeOut(1000);
                $('#autocom').val("");
                saltar_shop();
            });
        });
    });









    $("#searchlist").on("click", function (){//Click en search

        buscar();
    });

    window.addEventListener("keydown", function(event) { //Enter pressed
        if (event.key === "Enter") {
            buscar();
        }
    });


    function buscar(){
        var drop = $("#Ciudad").val();
        var drop2=$("#Tipo").val();
        var auto=$("#autocom").val();  //Filtrar por comida (espaguetis, puchero, macarrones y lasagna)

        if((drop=="%")&&(drop2=="%")&&(auto==="")){
           
            alert("Ingrese los criterios de busqueda");
     
        }else{
            if(!auto){
                auto="%";
            }

            localStorage.setItem('ciudad',drop);
            localStorage.setItem('categoria',drop2);
            localStorage.setItem('comida',auto)
            saltar_shop();
   
        }
    }



    function listar_ciudades(){  //No he usado la funcion ajaxforSearch porque me devuelve data vacio, creo que es un problema de PROMESAS


        $.ajax({
            url:"module/search/controller/controller_search.php?op=list_ciudad",
            type: 'GET',
            dataType: 'json',
                
        }).done(function(data){//Pintar ciudades
            // console.log(data);
            console.log(data);


            for(row in data){
                $('<option></option>').attr('value',data[row].Ciudad).appendTo('#Ciudad').html (
                    '<option value="'+data[row].Ciudad+'">'+data[row].Ciudad+'</option>'
                );
            }



        }).fail(function(){
            console.log("FAIIL");
        });

    }

        function listar_tipos(){  //No he usado la funcion ajaxforSearch porque me devuelve data vacio, creo que es un problema de PROMESAS


            $.ajax({
                url:"module/search/controller/controller_search.php?op=list_categorias",
                type: 'GET',
                dataType: 'json',
                    
            }).done(function(data){//Pintar ciudades
                // console.log(data);
                console.log(data);
    
    
                for(row in data){
                    $('<option></option>').attr('value',data[row].Tipo_habitacion).appendTo('#Tipo').html (
                        '<option value="'+data[row].Tipo_habitacion+'">'+data[row].Tipo_habitacion+'</option>'
                    );
                }
    
    
    
            }).fail(function(){
                console.log("FAIIL");
            });   
    }

});