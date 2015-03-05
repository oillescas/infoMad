(function($){
    console.log("cargando modulo maps 3.");
    var maps = {};
    maps.init = function(){

        var $el = $("#mapDiv");
        if($el.length ==1){



            var multi = $el.data('multi');
            var queryDatos = $el.data('origen');
            var $datos = $(queryDatos);
            var centro = new Microsoft.Maps.Location(40.417062, -3.703552);
            var zoom = 12;

            if(!multi){
                centro = new Microsoft.Maps.Location($datos.find('[itemprop="latitude"]').attr('content'), $datos.find('[itemprop="longitude"]').attr('content'));
                zoom = 14;
            }

            var map = new Microsoft.Maps.Map(document.getElementById("mapDiv"),
            {credentials:"AoBhurcO68zEsZnqzAYV2vZJ-mC_7CJ2ed1OndVK29akMiWNMf0EdbddQm00mqDI",
             center: centro,
             enableSearchLogo: false,
             showMapTypeSelector: false,
             zoom: zoom
            });


            $datos.each(function(){
                var $centro = $(this);
                // Define the pushpin location
                var lat = $centro.find('[itemprop="latitude"]').attr('content');
                var lon = $centro.find('[itemprop="longitude"]').attr('content');
                var loc = new Microsoft.Maps.Location(lat,lon);

                // Add a pin to the map
                var pin = new Microsoft.Maps.Pushpin(loc,{draggable: false});
                var  pinInfobox = new Microsoft.Maps.Infobox(pin.getLocation(),
                {
                 description: $centro.html(),
                 visible: false,
                 width :300, height :200,
                 offset: new Microsoft.Maps.Point(0,15)});

                Microsoft.Maps.Events.addHandler(pin, 'click', displayInfobox);

                // Hide the infobox when the map is moved.
                Microsoft.Maps.Events.addHandler(map, 'viewchange', hideInfobox);

                 function displayInfobox(e)
                 {
                    pinInfobox.setOptions({ visible:true });
                    map.setView({center: loc, zoom: 15});
                 }

                 function hideInfobox(e)
                 {
                    //pinInfobox.setOptions({ visible: false });
                 }

                map.entities.push(pin);
                map.entities.push(pinInfobox);
            });


        }
    };
    $(document).ready(maps.init);
})(jQuery);