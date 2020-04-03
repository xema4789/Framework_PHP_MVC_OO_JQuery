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




pintar_productos();





    function pintar_productos(){
        // alert("pintar productos");

       var items=localStorage.getItem('carrito');
       console.log("items");
       console.log(items);
       ajax_promise("module/cart/controller/controller_cart.php?op=pintar_productos&prods="+items,'GET','json').then(function(data){
        console.log("data:");
        console.log(data);




        $('#contenedor_cesta').empty();

        for (row in data){
            $('<div></div>').attr('id','productos_carrito').appendTo('#contenedor_cesta').html(
                '<img src="'+data[row].imagen+'"id="'+data[row].Numero_habitacion+'" class="foto_cart" href="#" alt="No se puede cargar la imagen">'+
                '<div>Ciudad: '+data[row].Ciudad+'</div>'+
                '<div>Tipo: '+data[row].Tipo_habitacion+'</div>'+
                'Cantidad:'+
                // '<div>'++'</div>'+
                '<div><input type="range" name="cantidad_prod" class="cantidad" id="cantidad_prod" value="1" min="1" max="10" step="1"></input></div></br>'+
                '<a class="cantidad"></a>'+
                '<a class="btn">Eliminar</a>'
                // '<div></div>'
            );
        }

        $(document).on('change','.cantidad',function(event){
            var cantidad=this.value;
            console.log(cantidad);
            console.log(this);
            this.innerHTML = ""+cantidad;

            
        });





        // '<img src="'+data[row].imagen+'" id="'+data[row].Numero_habitacion+'" class="foto_carrito" href="#" alt="No se puede cargar la imagen">'+
       });



        
        


        // for (row in productos){
        //     $('<div></div>').attr({'class':"foto",'id':data[row].Numero_habitacion}).appendTo('#contenedor_cesta').html (
                // '<img src="'+data[row].imagen+'" id="'+data[row].Numero_habitacion+'" class="foto_shop" href="#" alt="No se puede cargar la imagen">'+
                // '<p class="texto_imagen">'+data[row].Ciudad+'</p>'+
                // '<p class="texto_visitas">'+data[row].visitas+'</p>'+
                // '<p class="texto_ojo"></p>'+
                // '<p class="like_item" id="'+data[row].Numero_habitacion+'"></p>'+
                // '<p class="shop_item" id="'+data[row].Numero_habitacion+'"></p>'
                // );
                

        // }
    }
});