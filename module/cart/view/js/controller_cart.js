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
    // alert("ole los caracoles");
    var ids= new Array();
    var tipos= new Array();
    var precios= new Array();
    var cantidades= new Array();
    



    $('#articulo').on("click",'.shop_item',function(event){//EVENT es quien sabe a que le hemos dado like
    
    
        if($(event.target).is('.shop_item')){
            add_cart($(this));
            
        }
    });


    function add_to_carrito_backup(id){
        ajax_promise("module/cart/controller/controller_cart.php?op=back_up_carrito&id="+id,'GET','json').then(function(data){
            console.log("Dentro de la promise add to carrito backup");
            console.log(data);
        });

    }



    $(document).on("click",".shop_cart",function(){
        // alert("click en carrito");
        //Añadir producto

    });



    function add_cart(element){
        var id_habitacion=element.closest('.shop_item').attr('id'); 
        console.log("el id del producto es: "+id_habitacion);
        console.log("Antes add to carrito");
        add_to_carrito_backup(id_habitacion);
        console.log("Despues de add to carrito");


        ajax_promise("module/cart/controller/controller_cart.php?op=ver_tipo&id="+id_habitacion,'GET','json').then(function(data){
            console.log("el tipo es: "+data[0]['Tipo_habitacion']);
            // localStorage.setItem('carrito',id_habitacion);
            var items=[];
            var prueba=localStorage.getItem('carrito');
            if(prueba){
                items.push(localStorage.getItem('carrito'));
            }
           
            
            console.log(items);

            items.push(id_habitacion);


            localStorage.setItem('carrito',items.toString());

            console.log(localStorage.getItem('carrito'));
            //Añadir clase como que está en carrito y quitarle la clase que tenia para que no pueda volver a añadirlo
            $('#'+id_habitacion).find('.shop_item').addClass('active_cart');
            $('#'+id_habitacion).find('.shop_item').removeClass('shop_item'); 
        });
    }

  


    function pintar_items_carrito(){//Mas adelante acabaré esto, es para pintar los items que tengo ya en el carrito
        ajax_promise('module/cart/controller/controller_cart.php?op=ver_items_carrito','GET','json').then(function(data){
            for(row in data){
                $('#'+data[row]['id_habitacion']).find('.shop_item').addClass('active-cart');
            
    
            }
        }).catch(function (e){
            console.log("Fail promesa");
        })
    }



    $(document).on("click","#btn_check",function(){


        ajax_promise('module/login/controller/controller_login.php?&op=ver_usuario','GET','json').then(function(data){//Ver si esta logueado
            if(data!="no"){//Está logueado
                check_out();
                
            }else{//No está logueado
                alert("Debes realizar el login primero");
           

                callback="index.php?page=controller_login&op=list_login";
                window.location.href=callback; 
                //Ir a login
            }
        });

        
        });
    function productos_bd(){
        return new Promise((resolve, reject) => {ajax_promise("module/cart/controller/controller_cart.php?op=pintar_prods_bd",'GET','json').then(function(data){ 
            resolve (data);
        });
    });
            
        }

        function check_out(){
            $('#carrito').empty();
            productos_bd().then(function(data){
                var items2 = [];

            for (row in data){
                items2.push(data[row].Id)
            }
                var items=localStorage.getItem('carrito');
                ajax_promise("module/cart/controller/controller_cart.php?op=pintar_carrito_final&prods=" + items2, 'GET', 'json').then(function (data) {
                console.log(data);
                var precio_total=0;
                
                $('<div></div>').attr('class',"carrito_final").appendTo('#carrito').html(
                    '<h1>TOTAL</h1>'
                    );


                    for (row in data){
                       
                        var precio_prod=data[row].precio * data[row].cantidad; 
                        precio_total=precio_total+precio_prod;
                        
                        ////
                        ids.push(data[row].Numero_habitacion);
                        tipos.push(data[row].Tipo);
                        precios.push(precio_prod);
                        cantidades.push(data[row].cantidad);
                        ////
                        $('<div></div>').attr('class',"carrito_final_productos").appendTo('.carrito_final').html(
                            '<img src="' + data[row].imagen + '" class="foto_cart" href="#" alt="No se puede cargar la imagen"><br>' +
                            '<a>Tipo de habitación: '+data[row].Tipo+'</a><br>'+
                            '<a>Cantidad: '+data[row].cantidad+' </a><br>'+
                            '<a>Precio: '+data[row].precio+'</a><br>'+
                            '<a>Precio total:'+precio_prod+' </a>'


                        );
                    }

                    $('<div></div>').attr('class',"finalizar_compra").appendTo('.carrito_final').html(
                        '<h1>Precio total: '+precio_total+'</h1>'+
                        '<a class="btn" id="finalizar_compra">Finalizar</a>'
                        );
            });

        });
        }


        $(document).on("click","#finalizar_compra",function(){

            // var cantidad=1;
            var datos={ids:ids,tipos:tipos,precios:precios,cantidades:cantidades};
      
            ajax_promise("module/cart/controller/controller_cart.php?op=finalizar_compra&datos=" + JSON.stringify(datos), 'GET', 'json').then(function () {
                alert("Compra realizada con éxito");
                setTimeout(' window.location.href = "index.php?page=controller_home&op=list";',1000);
            });
        });

        


});