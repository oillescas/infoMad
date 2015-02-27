function init()
{
    $('#calendar').fullCalendar({
            lang: 'es',
            events: function(start, end, timezone, callback) {
                console.log(arguments);
                var events = [];
                $(".evento").each(function(){
                     events.push({
                        id: $(this).attr("id"),
                        title: $(this).find('[itemprop="name"]').text(),
                        start: $(this).find('[itemprop="startDate"]').attr("content"), // will be parsed
                        allDay: false,
                        editable: false
                    });
                });
                callback(events);
            }
    });
}


$(document).ready(init);