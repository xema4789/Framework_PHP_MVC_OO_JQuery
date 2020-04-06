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
    



    $('#articulo').on("click",'.shop_item',function(event){//EVENT es quien sabe a que le hemos dado like
    
    
        if($(event.target).is('.shop_item')){
            // alert("click en shop");
            // var id = $(".shop_item").attr("id");
            // console.log(id);
            add_cart($(this));
            
        }
    });



    $(document).on("click",".shop_cart",function(){
        // alert("click en carrito");
        //Añadir producto

    });



    function add_cart(element){
        var id_habitacion=element.closest('.shop_item').attr('id'); 
        console.log("el id del producto es: "+id_habitacion);
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

    function ver_tipo(id){

        
        //ir al dao y preguntar de que tipo es esa habitacion


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
        

        $('#carrito').empty();

        var items=localStorage.getItem('carrito');
        ajax_promise("module/cart/controller/controller_cart.php?op=pintar_carrito_final&prods=" + items, 'GET', 'json').then(function (data) {
            console.log(data);
            var precio_total=0;
            
            $('<div></div>').attr('class',"carrito_final").appendTo('#carrito').html(
                '<h1>TOTAL</h1>'
                );


                for (row in data){
                    var precio_prod=data[row].precio * 1; //1 es la cantidad que aun no se como pintarla
                    precio_total=precio_total+precio_prod;
                    
                    ////
                    ids.push(data[row].Numero_habitacion);
                    tipos.push(data[row].Tipo);
                    precios.push(precio_prod);
                    ////





                    


                    $('<div></div>').attr('class',"carrito_final_productos").appendTo('.carrito_final').html(
                        '<img src="' + data[row].imagen + '" class="foto_cart" href="#" alt="No se puede cargar la imagen">' +
                        '<a>Tipo de habitación: '+data[row].Tipo+'</a>'+
                        '<a>Cantidad: </a>'+
                        '<a>Precio: '+data[row].precio+'</a>'+
                        '<a>Precio total:'+precio_prod+' </a>'


                    );
                }

                $('<div></div>').attr('class',"finalizar_compra").appendTo('.carrito_final').html(
                    '<h1>Precio total: '+precio_total+'</h1>'+
                    '<a class="btn" id="finalizar_compra">Finalizar</a>'
                    );

                    


            });
        });


        $(document).on("click","#finalizar_compra",function(){
            console.log(ids);
            console.log(tipos);
            console.log(precios);
            var cantidad=1;


            ajax_promise("module/cart/controller/controller_cart.php?op=finalizar_compra&ids=" + ids+"&tipos="+tipos+"&precios="+precios+"&cantidad="+cantidad, 'GET', 'json').then(function (data) {



            });
        });

        


});