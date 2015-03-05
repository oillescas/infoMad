 function GetMap()
   {


        var $centro = $(".centro");
        $("#map-container").width($centro.width());

        var centro = new Microsoft.Maps.Location($centro.data('lat'), $centro.data('lon'));

        var map = new Microsoft.Maps.Map(document.getElementById("mapDiv"),
        {credentials:"AoBhurcO68zEsZnqzAYV2vZJ-mC_7CJ2ed1OndVK29akMiWNMf0EdbddQm00mqDI",
         center: centro,
         enableSearchLogo: false,
         showMapTypeSelector: false,
         zoom: 14
        });

        // Define the pushpin location
        var loc =centro;

        // Add a pin to the map
        var pin = new Microsoft.Maps.Pushpin(loc,{draggable: false});

        map.entities.push(pin);

        // Center the map on the location
        //map.setView({center: loc, zoom: 10});
   }


$(document).ready(GetMap);
 function GetMap()
   {
        var map = new Microsoft.Maps.Map(document.getElementById("mapDiv"),
        {credentials:"AoBhurcO68zEsZnqzAYV2vZJ-mC_7CJ2ed1OndVK29akMiWNMf0EdbddQm00mqDI",
         center: new Microsoft.Maps.Location(40.417062, -3.703552),
         enableSearchLogo: false,
         showMapTypeSelector: false,
        zoom: 12
        });

        $(".mapPosition").each(function(){
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
        // Center the map on the location
        //map.setView({center: loc, zoom: 10});
   }


$(document).ready(GetMap);
//# sourceMappingURL=listaitpo.js.map