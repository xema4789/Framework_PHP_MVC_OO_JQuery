$(document).ready(function () {


    $(document).on("click","#boton_map",function(){
        $('.shop').empty();
        mostar_map();
    });



    function mostar_map(){

        var map;

        
            $.ajax({
                url:"module/shop/controller/controller_shop.php?op=maps",
                type: 'GET',
                dataType: 'json',
                    
            }).done(function(data){
                console.log(data);

                var InforObj = [];
                    var centerCords = {
                        lat: 39.9908006,
                        lng: -3.3206571
                    };
                    var markersOnMap = [{
                            placeName:  data[0].Ciudad,
                            LatLng: [{
                                lat: parseFloat(data[0].latitud),
                                lng: parseFloat(data[0].longitud)
                            }]
                        },
                        {
                            placeName: data[1].Ciudad,
                            LatLng: [{
                                lat: parseFloat(data[1].latitud),
                                lng: parseFloat(data[1].longitud)
                            }]
                        },
                        {
                            placeName: data[2].Ciudad,
                            LatLng: [{
                                lat: parseFloat(data[2].latitud),
                                lng: parseFloat(data[2].longitud)
                            }]
                        },
                        {
                            placeName: data[3].Ciudad,
                            LatLng: [{
                                lat: parseFloat(data[3].latitud),
                                lng: parseFloat(data[3].longitud)
                            }]
                        },
                        {
                            placeName: data[4].Ciudad,
                            LatLng: [{
                                lat: parseFloat(data[4].latitud),
                                lng: parseFloat(data[4].longitud)
                            }]
                        },
                        {
                            placeName: data[5].Ciudad,
                            LatLng: [{
                                lat: parseFloat(data[5].latitud),
                                lng: parseFloat(data[5].longitud)
                            }]
                        }
                    ];

                    console.log("despues de definir los puntos");


                    initMap();
            
                    function addMarker() {
                        console.log("function add marker");
                        for (var i = 0; i < markersOnMap.length; i++) {
                            var contentString = '<div id="content"><h1>' + markersOnMap[i].placeName +
                                '</h1><p>Lorem ipsum dolor sit amet, vix mutat posse suscipit id, vel ea tantas omittam detraxit.</p></div>';
            
                            const marker = new google.maps.Marker({
                                position: markersOnMap[i].LatLng[0],
                                map: map
                            });
            
                            const infowindow = new google.maps.InfoWindow({
                                content: contentString,
                                maxWidth: 200
                            });
            
                            marker.addListener('click', function () {
                                closeOtherInfo();
                                infowindow.open(marker.get('map'), marker);
                                InforObj[0] = infowindow;
                            });
                   
                        }
                    }
            
                    function closeOtherInfo() {
                        if (InforObj.length > 0) {
                            /* detach the info-window from the marker ... undocumented in the API docs */
                            InforObj[0].set("marker", null);
                            /* and close it */
                            InforObj[0].close();
                            /* blank the array */
                            InforObj.length = 0;
                        }
                    }
            
                    function initMap() {
                        map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 6,
                            center: centerCords
                        });
                        addMarker();
                    }

            }).fail(function(){
                console.log("Fail");
            });
        

              
    }
                
});