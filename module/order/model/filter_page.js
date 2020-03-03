$(document).ready(function(){
    console.log ("dentro del ready order");
    console.log("antes del ajax");

//     $.ajax({
//         url:"module/order/controller/controller_order.php?op=datatable",
//         type: 'GET',
//         dataType: 'json',
            
//       }).done(function(data){
//         console.log(data);
//     }).fail(function(){
//         console.log("atontao");
//     })
// })

    console.log("despues del ajax");




    
    var url = "module/order/controller/controller_order.php?op=datatable";
    //preparar data
     var source=
     {
         dataType: "json", //array
        dataFields: [
             { name: 'Numero_habitacion', type: 'string'},
             { name: 'Tipo_habitacion', type: 'string'},
             { name: 'email', type: 'string'},
             { name: 'Fecha_entrada', type: 'string'}
         ],
         id: 'id',
         url: url
     };
     //console.log("despues del source");
     //console.log(source);
     var dataAdapter = new $.jqx.dataAdapter(source);  //Error en esta linea
     console.log("despues del dataAdapter");
     console.log(dataAdapter);
    $("#dataTable").jqxDataTable(
        {
            width: getWidth("dataTable"),
            pageable: true,
            pagerButtonsCount: 10,
            source: dataAdapter,
            sortable: true,
            pageable: true,
            altRows: true,
            filterable: true,
            columnsResize: true,
            pagerMode: 'advanced',
            columns: [
              { text: 'Numero de habitacion', dataField: 'Numero_habitacion'},
              { text: 'Tipo de habitacion', dataField: 'Tipo_habitacion' },
              { text: 'Email', dataField: 'email'},
              { text: 'Fecha de entrada', dataField: 'Fecha_entrada' }
          ]
        });  

        console.log(dataAdapter);

});