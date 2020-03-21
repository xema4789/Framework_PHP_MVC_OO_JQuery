$(document).ready(function(){
        console.log("antes del datatable");
    $('.habitacion').on("click",function(){
        var id = this.getAttribute('id');
          $.ajax({
            url:"module/user/controller/controller_user.php?op=read_modal&modal=" + id,
            type: 'GET',
            dataType: 'json',
            
          })
          .done(function(data){
            $('<div></div>').attr('id','details_habitacion','type','hidden').appendTo('#modalcontent');
            $('<div></div>').attr('id','container').appendTo('#details_habitacion');
            $('#container').empty();
            $('<div></div>').attr('id','Div1').appendTo('#container');
            



            $("#Div1").html(
                            '<br><span>Numero de habitacion: <span id="'+data.Numero_habitacion+'">'+data.Numero_habitacion+'</span></span></br>'+
                            '<br><span>Tipo de habitacion: <span id="tipo_habitacion">'+data.Tipo_habitacion+'</span></span></br>'+
                            '<br><span>Tipo de comida: <span id="tipo_comida">'+data.Tipo_comida+'</span></span></br>'+
                            '<br><span>Piscina: <span id="piscina">'+data.Piscina+'</span></span></br>'+
                            '<br><span>Mayordomo: <span id="mayordomo">'+data.Mayordomo+'</span></span></br>'+
                            '<br><span>Contraseña: <span id="pass">'+data.Contrasenya+'</span></span></br>'+
                            '<br><span>Email: <span id="email">'+data.email+'</span></span></br>'+
                            '<br><span>Fecha de entrada: <span id="f_ini">'+data.Fecha_entrada+'</span></span></br>'+
                            '<br><span>Fecha de salida: <span id="f_fin">'+data.Fecha_salida+'</span></span></br>'
                 )
            modal(data);
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
            console.log( "Error en el list: " +  textStatus);
        }
    });
   });
});


function modal(data){
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
            },
            Update: function(){
                $callback = 'index.php?page=controller_user&op=update&id='+data.Numero_habitacion;
    	        window.location.href=$callback;
            },
            Delete: function(){
                $callback ="index.php?page=controller_user&op=delete&id="+data.Numero_habitacion;
                window.location.href=$callback;
                $(this).dialog("close"); 
            }
        },
        show: {
            effect: "blind",
            duration: 1000
        },
        hide:{
            effect: "explode",
            duration: 1000
        }
    });
}

$(document).ready( function () {
    $('#table_crud').DataTable();
} );
      