function GetMap(){var t=$("#centro");$("#map-container").width(t.width());var e=new Microsoft.Maps.Location(t.data("lat"),t.data("lon")),a=new Microsoft.Maps.Map(document.getElementById("idMap"),{credentials:"AoBhurcO68zEsZnqzAYV2vZJ-mC_7CJ2ed1OndVK29akMiWNMf0EdbddQm00mqDI",center:e,enableSearchLogo:!1,showMapTypeSelector:!1,zoom:14}),n=e,i=new Microsoft.Maps.Pushpin(n,{draggable:!1});a.entities.push(i)}function init(){$("#calendar").fullCalendar({lang:"es",events:function(t,e,a,n){console.log(arguments);var i=[];$(".evento").each(function(){i.push({id:$(this).attr("id"),title:$(this).find('[itemprop="name"]').text(),start:$(this).find('[itemprop="startDate"]').attr("content"),allDay:!1,editable:!1})}),n(i)}})}$(document).ready(GetMap),$(document).ready(init);