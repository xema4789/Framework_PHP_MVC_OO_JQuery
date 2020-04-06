function ajax_promise(urlP, typeP, dataTypeP) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: urlP,
            type: typeP,
            dataType: dataTypeP,

        }).done(function (data) {
            resolve(data);
        }).fail(function () {
            console.log("FAIL");
            reject("FAIL");
        });
    });
}


$(document).ready(function () {
    // alert("ole los caracoles");




    pintar_productos();





    function pintar_productos() {
        // alert("pintar productos");
        var items = [];

        items = localStorage.getItem('carrito');
        console.log("items");
        console.log(items);

        



        ajax_promise("module/cart/controller/controller_cart.php?op=pintar_productos&prods=" + items, 'GET', 'json').then(function (data) {
            console.log("data:");
            console.log(data);

            if(data!="error"){
                $('#contenedor_cesta').empty();



            for (row in data) {
                $('<div></div>').attr({ 'class': "productos_carrito", 'id': data[row].Numero_habitacion }).appendTo('#contenedor_cesta').html(
                    '<img src="' + data[row].imagen + '"id="' + data[row].Numero_habitacion + '" class="foto_cart" href="#" alt="No se puede cargar la imagen">' +
                    '<div>Ciudad: ' + data[row].Ciudad + '</div>' +
                    '<div>Tipo: ' + data[row].Tipo_habitacion + '</div>' +
                    'Cantidad:' +
                    // '<div>'++'</div>'+
                    '<div id="cantidad_contenedor">'+
                    '<div><input type="range" name="cantidad_prod" class="cantidad" id="cantidad_prod" value="1" min="1" max="10" step="1"></div></br>' +
                    '<a class="cant">Cantidad: 1</a>'+
                    '</input>'+
                    '</div>'+
                    '<a class="cantidad"></a>' +
                    '<div class="btn" id="delete">Eliminar</div>'
                    // '<div></div>'
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


            






            // '<img src="'+data[row].imagen+'" id="'+data[row].Numero_habitacion+'" class="foto_carrito" href="#" alt="No se puede cargar la imagen">'+
        });


    }
    $(document).on('change', '.cantidad', function (event) {
        var cantidad = this.value;
        console.log(cantidad);
        // console.log(this);
        var todo=this;
        console.log(todo);
        $(this).children().empty();
        $(this).children().html(
            '<a class="cant">Cantidad: '+cantidad+'</a>'

        );


    });

    $(document).on("click", "#delete", function () {
        var id = $(this).parent().attr('id');

        var items =  localStorage.getItem('carrito');
        var items2= new Array();
        items2=items.split(",");

        const index = items2.indexOf(id);

        items2.splice(index,1);
        localStorage.setItem('carrito',items2);
        pintar_productos();
    });
});