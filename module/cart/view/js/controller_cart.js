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

            localStorage.setItem('carrito',items);

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


});