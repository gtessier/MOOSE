      jQuery(document).ready(function($){

         //Map Jquery
         var map = new GMaps({
            el: '#map', 
            lat: glat,
            lng: glong,
            zoom: 17,
            scrollwheel: false,
            navigationControl: false,
            mapTypeControl: false,
            scaleControl: false,
            draggable: false,
            zoomControl : true,
            zoomControlOpt: {
               style : 'SMALL',
               position: 'TOP_LEFT'
            },
            panControl : false,
            streetViewControl : false,
            mapTypeControl: false,
            overviewMapControl: false 
         });

         map.addMarker({
            lat: glat,
            lng: glong,
            icon: gmarker
         });

         var styles = [
         {
            featureType: "road",
            elementType: "geometry",
            stylers: [
            { lightness: 100 },
            { visibility: "simplified" }
            ]
         }, {
            featureType: "road",
            elementType: "labels",
            stylers: [
            { visibility: "off" }
            ]
         }
         ];

         map.addStyle({
            styledMapName:"Styled Map",
            styles: styles,
            mapTypeId: "map_style"  
         });

         map.setStyle("map_style");

      });