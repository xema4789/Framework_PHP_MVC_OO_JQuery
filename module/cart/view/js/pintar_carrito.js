function ajax_promise(urlP, typeP, dataTypeP,arg1='no') {
    urlP=(amigable(urlP));
    console.log("URL");
    console.log(urlP);
    return new Promise((resolve, reject) => {
        console.log("HOLA???")
        $.ajax({
            url: urlP,
            type: typeP,
            data: {"okay":true,"arg1":arg1},
            dataType: dataTypeP,

        }).done(function (data) {
            resolve(data);
        }).fail(function () {
            console.log("FAIiiL CARRITO");
            reject("FAILLL CARRITO");
        });
    });
}


$(document).ready(function () {

 
    pintar_productos();
    

    function productos_bd(){

        return new Promise((resolve, reject) => {ajax_promise("?module=cart&function=pintar_prods_bd",'POST','json').then(function(data){
            console.log("DATAAAA BD:");
            console.log(data);

            

            resolve (data);

        });
    });
        
    }






    function pintar_productos() { 
        
        //Buscar prods en bd
        

        productos_bd().then(function(data){
    
            var items = [];

            for (row in data){
                items.push(data[row].Id)
            }
            


            ajax_promise("?module=cart&function=pintar_productos",'POST','json',items).then(function (data) {
                console.log("data:");
                console.log(data);
    
                if(data!="error"){
                    $('#contenedor_cesta').empty();
                    $('#check_out').empty();
    
    
    
                for (row in data) {
                    $('<div></div>').attr({ 'class': "productos_carrito", 'id': data[row].Numero_habitacion }).appendTo('#contenedor_cesta').html(
                        '<img src="' + data[row].imagen + '"id="' + data[row].Numero_habitacion + '" class="foto_cart" href="#" alt="No se puede cargar la imagen">' +
                        '<div>Ciudad: ' + data[row].Ciudad + '</div>' +
                        '<div>Tipo: ' + data[row].Tipo_habitacion + '</div>' +
                        'Cantidad:' +
                        
                        '<div><input type="range" name="cantidad_prod" class="cantidad" id="'+data[row].Numero_habitacion+'"  value="1" min="1" max="10" step="1"></br>' +
                        '<div class="cant">Cantidad: '+data[row].cantidad+' </div>'+
                        // '<input type="text" name="cantidad2" id="cantidad2"</input>'+
                        '</input></div>'+
                        
                       
                        '<a class="cantidad"></a>' +
                        '<div class="btn" id="delete">Eliminar</div>'
                    );
                }
                $('<div></div>').attr('id', "btn_check").appendTo('#check_out').html(
                    '<div class="btn">CHECK OUT</div>'
                );
    
                }else{
                    $('<div></div>').attr('class',"productos_carrito").appendTo('#contenedor_cesta').html(
                    '<div>Cesta vacia</div>'
                    );
                }
            });//Fin promesa pintar productos



        });//Fin promesa productos_bd
    }

   


    $(document).on('change', '.cantidad', function (event) {
        // if($(event.target).is('.cantidad')){
            
        // }
        var cantidad = this.value;
        console.log(cantidad);
        // event.children().empty();
            $(this).children().empty();
            var id=event.target.id;
            console.log(id);
            cambiar_cantidad(id,cantidad).then(function(data){
                console.log(data);
                pintar_productos();
            })


            // $(this).children().html(
            //     '<a class="cant">Cantidad: '+cantidad+'</a>'

            // );
        


    });

    function cambiar_cantidad(id,cantidad){
        return new Promise((resolve,reject)=>{
            ajax_promise("module/cart/controller/controller_cart.php?op=cambiar_cantidad&id="+id+"&cant="+cantidad,"GET",'json').then(function(){
                console.log("cambiado");
                resolve("ok");
            });
        });   
    }

    $(document).on("click", "#delete", function () {
        var id = $(this).parent().attr('id');
        eliminar_producto_bd(id).then(function(){
            var items =  localStorage.getItem('carrito');
            var items2= new Array();
            items2=items.split(",");

            const index = items2.indexOf(id);

            items2.splice(index,1);
            localStorage.setItem('carrito',items2);
            pintar_productos();
        })
    });


    function eliminar_producto_bd(id){
        return new Promise((resolve,reject)=>{
            ajax_promise("module/cart/controller/controller_cart.php?op=delete&id="+id,"GET",'json').then(function(){
                console.log("Borrado");
                resolve("ok");
            });
        });   
    }
});