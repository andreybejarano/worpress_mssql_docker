<?php
/*
Template Name: Plantilla de mapa
*/

global $post;

$markers = get_field('marcadores');
$markers_js = array();

foreach($markers as $row){
    array_push($markers_js,$row);
}



$destacadas_slider = get_field('destacadas');

get_header(); 

echo "<script>var markers_js = " . json_encode($markers_js) . "</script>";

?> 



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdvzJPCZSCtu-YpS9djkruUwmii1m9jIA&libraries=places"></script>
    <style type="text/css">
        #google-container {
            position: relative;
            width: 100%;
            height: 500px;
            background-color: #e7eaf0;
        }

        @media only screen and (min-width: 768px) {
            #google-container {
                height: 500px;
            }
        }

        @media only screen and (min-width: 1170px) {
            #google-container {
                height: 600px;
            }
        }

        #cd-google-map {
            position: relative;
        }

            #cd-google-map address {
                position: absolute;
                width: 100%;
                bottom: 0;
                left: 0;
                padding: 1em 1em;
                background-color: rgba(211, 104, 104, 0.9);
                color: white;
                font-size: 13px;
                font-size: 0.8125rem;
            }

        @media only screen and (min-width: 768px) {
            #cd-google-map address {
                font-size: 15px;
                font-size: 0.9375rem;
                text-align: center;
            }
        }
    </style>

    <div class="">
            <div class="left-column">
               <!--breadcrum-->
               <div class="breadcrum-bar">
                  <ol class="list">
                     <li class="item"><a href="#" class="link">INICIO</a></li>
                     <li class="item current">Representaciones</li>
                  </ol>
               </div>
               <!--breadcrum-->
               <div class="row-info">
                  <h1 class="title">REPRESENTACIONES</h1>
                  <div class="info">
                    <p>El IERIC cuenta con una sede central en Capital Federal y representaciones en las principales provincias y ciudades de todo el país.</p>
                  </div>
               </div>
               <?php if($destacadas_slider):?>
               <div class="representaciones-slider">
                  <div class="vertical-slider swiper-container">
                     <div class="swiper-wrapper">

                        <?php foreach($destacadas_slider as $slide):
                            $desc_breve = get_field('descripcion_breve', $slide->ID);?>
                            <article class="item-news swiper-slide">
                                <picture>
                                    <a href="<?= get_permalink($slide->ID)?>" title="<?= $slide->post_title?>">
                                        <img src="http://localhost:8081/wp-content/uploads/2019/10/30092019111111.jpg.jpeg" alt="">
                                    </a>
                                </picture>
                                <a href="<?= get_permalink($slide->ID)?>" class="info-news">
                                    <h3 class="main-title"><?= $slide->post_title ?></h3>
                                    <p class="description"><?= $desc_breve?></p>
                                </a>
                            </article>

                        <?php endforeach ?>
                            
                     </div>
                     <div class="next-btn"></div>
                  </div>
                  <div class="representaciones-link">
                     <a href="<?= DOMAIN ?>/destacados" title="Ver todos los destacados">Ver todos los destacados</a>
                  </div>
               </div>
               <?php endif ?>


               <div class="representaciones-map">
                  <h3>ENCONTRÁ LA REPRESENTACIÓN MÁS CERCANA A TU UBICACIÓN</h3>
                  <div class="form-container flex-container justify-between">
                     <input type="text" id="txtDireccionBusqueda" placeholder="Ingresá tu dirección..." autocomplete="off">
                     <a class="geo-link flex-container align-center" href="javascript:getCurrentLocation();"><img src="<?= THEME_DIST ?>/img/gpd.jpg">o Geolocalizate</a>
                     <input type="hidden" id="txtAuxLat" value="">
                     <input type="hidden" id="txtAuxLon">
                  </div>
                  <div class="map-container">
                     <div id="cd-google-map">
                        <div id="google-container"></div>
                                
                     </div>
                  </div>
               </div>
            </div>
    </div>


    <script>
     var map_zoom = 4;
        var mymarker = null;
        var latitude = -37.9248496;
        var longitude = -63.7295546;

        var allMarkers = [];
        var allMarkers_lat = []
        var allMarkers_lng = []

        var allMarkers_object = [];


        var infowindow;
        var geocoder = new google.maps.Geocoder();

        var map = new google.maps.Map(document.getElementById('google-container'), {
            zoom: map_zoom,
            center: new google.maps.LatLng(latitude, longitude),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            //styles: style,
            panControl: false,
            zoomControl: true,
            mapTypeControl: false,
            streetViewControl: true,
            scrollwheel: false,
        });

        function getCurrentLocation()
        {
            $("#txtDireccionBusqueda,#txtAuxLat,#txtAuxLong").val("");

            // Try HTML5 geolocation.
            if (navigator.geolocation) {

                //alert("gelolocalizando..");

                navigator.geolocation.getCurrentPosition(function (position) {
                    

                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    infoWindow = new google.maps.InfoWindow;
                    infoWindow.setPosition(pos);
                    map.setCenter(pos);

                    // Place the new marker
                    if (mymarker != null) {
                        mymarker.setMap(null);
                    }


                    find_closest_marker(pos, allMarkers, allMarkers_lat, allMarkers_lng, allMarkers_object);


                    mymarker = new google.maps.Marker({
                        animation: google.maps.Animation.DROP,
                        map: map,
                        position: pos,
                        icon: 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container-bg_4x.png,icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=ff000000,A52714,ff000000'
                    }); // end place the new marker

                    // Add event listener. On marker click, close all open infoWindows open current infoWindow.
                    google.maps.event.addListener(mymarker, "click", function () {
                        if (infowindow) infowindow.close();
                        infowindow = new google.maps.InfoWindow({ content: "Tú" });
                        infowindow.open(map, mymarker);
                    }); // end add event listener

                    /*map = new google.maps.Map(document.getElementById('google-container'), {
                        zoom: map_zoom,
                        center: new google.maps.LatLng(latitude, longitude),
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        //styles: style,
                        panControl: false,
                        zoomControl: true,
                        mapTypeControl: false,
                        streetViewControl: true,
                        scrollwheel: false,
                    });

                    //Create LatLngBounds object.
                    var bounds = new google.maps.LatLngBounds();

                    $.ajax({
                        type: "POST",
                        url: 'representaciones-mapa.aspx/GetMarkersByDistance',
                        data: "{location: '" + pos.lng + " " + pos.lat + "'}",
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (data) {
                            $(data.d).each(function () {
                                var eachMarker = jQuery(this);
                                var markerCoords = new google.maps.LatLng(parseFloat((this).Latitud), parseFloat((this).Longitud));
                                var html = "<div class='info-blob'><b>" + (this).Nombre + "</b><br>" + (this).Direccion + "<br>Tel: " + (this).Telefono + "<br>Horario de atención: " + (this).HorarioAtencion + "<br>Email: <a href='mailto:" + (this).Email + "'>" + (this).Email + "</a></div>";
                                var marker = addMarker(html, markerCoords);

                                //Extend each marker's position in LatLngBounds object.
                                bounds.extend(markerCoords);
                            });
                        }
                    });

                    //Center map and adjust Zoom based on the position of all markers.
                    //map.setCenter(latlngbounds.getCenter());
                    //now fit the map to the newly inclusive bounds
                    //map.fitBounds(bounds);
                    //map.panToBounds(bounds);
                    //map.setCenter(bounds.getCenter());
                    */
                    map.setZoom(8);
                }, function () {
                    alert("No se pudo obtener su ubicación actual");

                    //handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                alert("Tu browser no soport gelocalizacion");
                // Browser doesn't support Geolocation
                //handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        //funcion que traduce la direccion en coordenadas
        function codeAddress() {
            var address = $("#txtDireccionBusqueda").val();
            var callback1 = function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    $('#txtAuxLat').val(results[0].geometry.location.lat());
                    $('#txtAuxLong').val(results[0].geometry.location.lng());

                    var pos = {
                        lat: results[0].geometry.location.lat(),
                        lng: results[0].geometry.location.lng()
                    };
                    infoWindow = new google.maps.InfoWindow;
                    infoWindow.setPosition(pos);

                    //infoWindow.setContent('Location found.');
                    map.setCenter(pos);
                    map.setZoom(8);

                    

                    // Place the new marker
                    if (mymarker != null) {
                        mymarker.setMap(null);
                    }


                    mymarker = new google.maps.Marker({
                        animation: google.maps.Animation.DROP,
                        map: map,
                        position: pos,
                        icon: 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container-bg_4x.png,icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=ff000000,A52714,ff000000'
                    }); // end place the new marker

                    
    
                    find_closest_marker(pos, allMarkers, allMarkers_lat, allMarkers_lng, allMarkers_object);


                    // Add event listener. On marker click, close all open infoWindows open current infoWindow.
                    google.maps.event.addListener(mymarker, "click", function () {
                        if (infowindow) infowindow.close();
                        infowindow = new google.maps.InfoWindow({ content: "Tú" });
                        infowindow.open(map, mymarker);
                    }); // end add event listener

                    //$('#form-buscar').submit();
                } else {
                    //alert("No podemos encontrar la dirección, error: " + status);
                }
            };
            geocoder.geocode({ 'address': address }, callback1);
        }

        function initMap() {
            infoWindow = new google.maps.InfoWindow;

            $.each(markers_js,function(index, value){
                var markerCoords = new google.maps.LatLng(parseFloat(value.ubicacion.lat), parseFloat(value.ubicacion.lng));
                var html = "<div class='info-blob'><b>" + value.nombre + "</b><br>" + value.direccion + "<br>Tel: " + value.telefono + "<br>Horario de atención: " + value.horario + "<br>Email: <a href='mailto:" + value.email + "'>" + value.email + "</a></div>";
                var marker = addMarker(html, markerCoords);


                
                allMarkers.push(html);
                allMarkers_lat.push(value.ubicacion.lat);
                allMarkers_lng.push(value.ubicacion.lng);
            });

            // $(data.d).each(function () {
            //     var eachMarker = jQuery(this);
            //     var markerCoords = new google.maps.LatLng(parseFloat((this).Latitud), parseFloat((this).Longitud));
            //     var html = "<div class='info-blob'><b>" + (this).Nombre + "</b><br>" + (this).Direccion + "<br>Tel: " + (this).Telefono + "<br>Horario de atención: " + (this).HorarioAtencion + "<br>Email: <a href='mailto:" + (this).Email + "'>" + (this).Email + "</a></div>";
            //     var marker = addMarker(html, markerCoords);
            // });

            //autocomplete
            var input = (document.getElementById('txtDireccionBusqueda'));
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                codeAddress();
            });
        } // end initialize();
        
        // Create a marker for each XML entry
        function addMarker(html, markerCoords) {

            // Place the new marker
            var marker = new google.maps.Marker({
                animation: google.maps.Animation.DROP,
                map: map,
                position: markerCoords,
                icon: 'https://mt.googleapis.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png'
            }); // end place the new marker

            allMarkers_object.push(marker);

            // Add event listener. On marker click, close all open infoWindows open current infoWindow.
            google.maps.event.addListener(marker, "click", function () {
                if (infowindow) infowindow.close();
                infowindow = new google.maps.InfoWindow({ content: html });
                infowindow.open(map, marker);
            }); // end add event listener
        }



        function rad(x) {return x*Math.PI/180;}
   
   
        function find_closest_marker( event, html, lat_, lng_ ) {

        DeleteMarkers();
         
        var lat = event.lat;
        var lng = event.lng;
        var R = 6371; // radius of earth in km
        var distances = [];
        var closest = -1;


        for( i=0;i<html.length; i++ ) {

            var mlng = lng_[i];
            var mlat = lat_[i];


            var dLat  = rad(mlat - lat);
            var dLong = rad(mlng - lng);
            var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(rad(lat)) * Math.cos(rad(lat)) * Math.sin(dLong/2) * Math.sin(dLong/2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
            var d = R * c;
            distances[i] = d;
            if ( closest == -1 || d < distances[closest] ) {
                closest = i;
            }
        }

        var markerCoords = new google.maps.LatLng(parseFloat(lat_[closest]), parseFloat(lng_[closest]));

        mymarker_near = new google.maps.Marker({
            animation: google.maps.Animation.DROP,
            map: map,
            position: markerCoords,
            icon: 'https://mt.googleapis.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png'
        }); // end place the new marker

        
        allMarkers_object.push(mymarker_near);

        // Add event listener. On marker click, close all open infoWindows open current infoWindow.
        google.maps.event.addListener(mymarker_near, "click", function () {
            if (infowindow) infowindow.close();
            infowindow = new google.maps.InfoWindow({ content: html[closest] });
            infowindow.open(map, mymarker_near);
        }); // end add event listener

        infowindow = new google.maps.InfoWindow({ content: html[closest] });
        infowindow.open(map, mymarker_near);


}


function DeleteMarkers() {
        //Loop through all the markers and remove
        for (var i = 0; i < allMarkers_object.length; i++) {
            allMarkers_object[i].setMap(null);
        }
};

        jQuery(document).ready(function ($) {
            initMap();
        });
    </script>

<?php get_footer(); ?>