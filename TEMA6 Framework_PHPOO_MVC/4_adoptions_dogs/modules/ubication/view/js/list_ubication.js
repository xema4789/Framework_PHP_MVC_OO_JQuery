$(document).ready(function(){
  $.get(amigable("?module=ubication&function=load_prov"),function(data){
    arr = [];
    json = JSON.parse(data);
    $.each( json, function(value,data){
      arr.push(data.nombre);
  });

  $("#keyword").autocomplete({
        source: arr,
        minLength: 1,
        select: function (event, ui) {
            var keyword = ui.item.label;
            $.post(amigable("?module=ubication&function=get_lat_lng"),{'prov':keyword},function(data){
              console.log(data);
              json = JSON.parse(data);
              setCookie("ubi", keyword, 1);
              setCookie("lat", json[0].lat, 1);
              setCookie("long", json[0].long, 1);
              location.reload(true);
            });
        }
    });
  });

  $(document).on('click','.details_gmaps_marker',function(){
    $(".list_dogis").empty();
    var id = this.getAttribute('id');

    $.post(amigable("?module=ubication&function=details_list_gmap"),{"idchip": id}, function( data ) {
      json = JSON.parse(data);
      var age = calcularEdad(json[0].date_birth);
        var data_list = "<div id='content_img'><img class='modalbutt' id='" + json[0].chip + "' src='" + json[0].picture + "'>" +
              "</div><div id='content_info'><div id='header_list'><span>Nombre: " + json[0].name + ",</span><span> Raza: " + json[0].breed + "</span></div>" +
              "<div id='content_list'><span>Sexo: " + json[0].sex + ",</span><span> Estatura: " + json[0].stature + "</span><br>" +
              "<span>Ubicacion: " + json[0].country + ", " + json[0].province + ", " + json[0].city + "</span><br><span>Teléfono: " + json[0].tlp + "</span>" +
              "<br><span>Edad: " + age +  "</span><br><span>Caracteristicas: " + json[0].cinfo + "</span></div>";
        $(".list_dogis").append(data_list);
    });
  });

});

function initMap() {
  if (getCookie("lat") && getCookie("long") && getCookie("ubi")) {
      var ubi = getCookie("ubi");
      var lati = getCookie("lat");
      var long = getCookie("long");
      setCookie("ubi","",1);
      setCookie("lat","",1);
      setCookie("long","",1);
  }

  var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
  var icons = {
      perro: {
        icon: '../../view/img/icongmapsm.png'
      },
      perra: {
        icon: '../../view/img/icongmapsh.png'
      }
  };
  
  if (typeof ubi !== 'undefined') {
    zoom = 7;
  }else{
    zoom = 15;
  }
  
  var map = new google.maps.Map(document.getElementById('map'), {
    center: new google.maps.LatLng(40.0533658, -5.3425139),
    zoom: zoom
  });
  
  var infoWindow = new google.maps.InfoWindow;

  $.get(amigable("?module=ubication&function=load_location"),function(data){
    cont=0
    var xml = data.documentElement.getElementsByTagName('marker');
    Array.prototype.forEach.call(xml, function(markerElem) {
      cont++;
      var name = markerElem.getAttribute('name');
      var chip = markerElem.getAttribute('chip');
      var breed = markerElem.getAttribute('breed');
      var tlp = markerElem.getAttribute('tlp');
      var sex = markerElem.getAttribute('sex');
      var img = markerElem.getAttribute('img');
      var city = markerElem.getAttribute('city');
      var province = markerElem.getAttribute('province');
      var point = new google.maps.LatLng(
          parseFloat(markerElem.getAttribute('lat')),
          parseFloat(markerElem.getAttribute('longit'))
      );

      var infowincontent = document.createElement('div');
      infowincontent.setAttribute("id","all_content_gmaps");
      /*infowincontent.innerHTML="<div class='maps_content_img'><img src='" + img + "'></div><div class='maps_content_text'>"+
                               "<span>Nombre: " + name + "</span><br/><span>Raza: " + breed + "<span></div>";*/
      if (typeof ubi !== 'undefined') {
          if (ubi === province) {
              infowincontent.innerHTML="</div><div class='maps_content_text'>"+
                               "<span><b>Nombre: </b>" + name + "</span><br/><span><b>Raza: </b>" + breed + "</span><br/><span><b>Telefono: </b>" + tlp + "</b></span><br/>" + 
                               "<span id='" + chip + "' class='details_gmaps_marker' data-toggle='modal' data-target='#exampleModal'>Ver mas información</span></div>";
              var xml = new google.maps.Marker({
                map: map,
                position: point,
                icon: icons[sex].icon,
                label: cont.toString()
              });
              xml.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, xml);
              });
              $("#list_gmaps").append("<div id=" + markerElem.getAttribute('lat') + "," + markerElem.getAttribute('longit') + " class='gmapsclick'><span><b>Nº:</b>" + cont + "&nbsp; &nbsp; &nbsp;<b>Ubicacion:</b> " + city + "</span><br/>" +
                                      "<span><b>Nombre:</b> " + name + "</span>&nbsp; &nbsp;<span><b>Raza:</b> " + breed + "</span></div><hr>");
          }
      }else{
        infowincontent.innerHTML="</div><div class='maps_content_text'>"+
                               "<span><b>Nombre: </b>" + name + "</span><br/><span><b>Raza: </b>" + breed + "</span><br/><span><b>Telefono: </b>" + tlp + "</b></span><br/>" + 
                               "<span id='" + chip + "' class='details_gmaps_marker' data-toggle='modal' data-target='#exampleModal'>Ver mas información</span></div>";
        var xml = new google.maps.Marker({
          map: map,
          position: point,
          icon: icons[sex].icon,
          label: cont.toString()
        });
        xml.addListener('click', function() {
          infoWindow.setContent(infowincontent);
          infoWindow.open(map, xml);
        });
        $("#list_gmaps").append("<div id=" + markerElem.getAttribute('lat') + "," + markerElem.getAttribute('longit') + " class='gmapsclick'><span><b>Nº:</b>" + cont + "&nbsp; &nbsp; &nbsp;<b>Ubicacion:</b> " + city + "</span><br/>" +
                                "<span><b>Nombre:</b> " + name + "</span>&nbsp; &nbsp;<span><b>Raza:</b> " + breed + "</span></div><hr>");
      }
    });
  });

  if (typeof ubi !== 'undefined') {
    var point = new google.maps.LatLng(
      parseFloat(lati),
      parseFloat(long)
    );
    map.setCenter(point);
  }else{
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        map.setCenter(pos);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  }

  $(document).on('click','.gmapsclick',function(){
    point = $(this).attr('id');
    infowincontent = $(this).attr('name');
    point = point.split(',');
    var point = new google.maps.LatLng(
        parseFloat(point[0]),
        parseFloat(point[1])
    );
    map.setCenter(point);
    map.setZoom(14);
  });

}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return 0;
}

function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    if (m < 0) {
      m = m.toString();
      var m = m.substring(1, m.length);
    }
    if (edad === 0) {
      return m + " Meses";
    }else{
      if (m === 0) {
        return edad + " Años";
      }else{
        return edad + " Años y " + m + " Meses";
      }
    }
}
