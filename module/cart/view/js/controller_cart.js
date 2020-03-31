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

    }


});