function ajax_succes_promise(type, url, serialize){
  return new Promise((resolve,reject)=>{
      $.ajax({
          type : type,
          url  : url + serialize,
          success: function(data){	
              resolve(data);
          }
      });
  });

  
}

$(document).ready(function () {
  
    if(document.getElementById("mapa") != null){
      var script = document.createElement('script');
      script.src = "https://maps.googleapis.com/maps/api/js?key="+"AIzaSyDw70qnfrtBW3CFI-C8VNxRxbU7Nyha5jE"+"&callback=initMap";
      script.async;
      script.defer;
      document.getElementsByTagName('script')[0].parentNode.appendChild(script);
    }
  });
  // "https://maps.googleapis.com/maps/api/js?key="+"AIzaSyDw70qnfrtBW3CFI-C8VNxRxbU7Nyha5jE"

  
  
  function initMap() {
      var ontinyent = {lat: 38.817522, lng: -0.6039023};   
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,   
        center: ontinyent
      });
      var contentString = '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h1 id="firstHeading" class="firstHeading">ESTAMOS AQUIIIII</h1>'+
          '<div id="bodyContent">'+
          '<p><b>Ontinyent</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
          'sandstone rock formation in the southern part of the '+
          'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
          'south west of the nearest large town, Alice Springs; 450&#160;km '+
          'Heritage Site.</p>'+
          '<p>Attribution:<b> IES LESTACIÓ</b>, <a href="http://www.iestacio.com/</a> '+
          '(last visited June 22, 2019).</p>'+
          '</div>'+
          '</div>';
  
          var infowindow = new google.maps.InfoWindow({
              content: contentString
            });
    
            var marker = new google.maps.Marker({
              position: ontinyent,
              map: map,
              title: 'Ontinyent'
            });

            marker.addListener('click', function() {
              infowindow.open(map, marker);

              
             });
            }

            $(document).on("click","#send_mail",function(){
              // alert("hola");
			        $('.ajaxLoader').fadeIn("fast");
              var data = {"cname":$("#name").val(),"cemail":$("#email").val(),"matter":$("#asunto").val(),"message":$("#message").val()};
              var fin_data=JSON.stringify(data);
              console.log("data1: ");
              console.log(fin_data);

              if(validate_email()){

              
              $.ajax({
                type : 'POST',
                url  : "?module=contact&function=send_cont", //amigable("?module=contact&function=send_cont")
                data: {'fin_data':fin_data},
                success: function(data){	
                  // $("#name").html(" aaaaaaaaa");
                  // $("#message").html(" dfdf");
                  // $("#asunto").html("dfbsf");
                  // $("#email").html(" nfdndt");
            

                    limpiar();
                    Command: toastr["success"]("Mail enviado con éxito", "Succes!")

                    toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }




                }
              });

            }

            

            });









            

            function validate_email(){
              var nombre=$("#name").val();
              var email=$("#email").val();
              var asunto=$("#asunto").val();
              var message=$("#message").val();
              var comprobar=true;
              var pname = /^[a-zA-Z]+[\-'\s]?[a-zA-Z]{2,51}$/;
	            var pmessage = /^[0-9A-Za-z\s]{20,100}$/;
    	        var pmail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
              
              if(!nombre){
                $("#e_name").html("El nombre no puede estar vacio");
                comprobar=false;
              }else if(!pname.test(nombre)){
                $("#e_name").html("El nombre tiene que tener un minimo de 3 caracteres");
                comprobar=false;
                
              }else{
                $("#e_name").html("");
              }

              if(!email){
                $("#e_email").html("El email no puede estar vacio");
                comprobar=false;
              }else if(!pmail.test(email)){
                $("#e_email").html("El email no cumple con los requisitos");
                comprobar=false;
              }else{
                $("#e_email").html("");
              }

              if(!asunto){
                $("#e_asunto").html("El asunto no puede estar vacio");
                comprobar=false;
              }else{
                $("#e_asunto").html("");
              }
              
              if(!message){
                $("#e_message").html("El mensaje no puede estar vacio");
                comprobar=false;
              }else if(!pmessage.test(message)){
                $("#e_message").html("El mensaje debe contener al menos 20 caracteres");
                comprobar=false;
              }else{
                $("#e_message").html("");
              }
              return comprobar;
            }

    function limpiar(){
      console.log("limpiar");

      // console.log($(document).getElementById("name").val());
      $("#message").html(" ");
      $("#asunto").html(" ");
      $("#email").html(" ");
    }


  