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