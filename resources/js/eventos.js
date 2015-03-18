(function($){
    function init()
    {
        $('#calendar').fullCalendar({
                lang: 'es',
                events: function(start, end, timezone, callback) {
                    var events = [];
                    $(".evento").each(function(){
                         events.push({
                            id: $(this).attr("id"),
                            title: $(this).find('[itemprop="name"]').text(),
                            start: $(this).find('[itemprop="startDate"]').attr("content"), // will be parsed
                            description : $(this).find('[itemprop="description"]').text(),
                            allDay: false,
                            editable: false
                        });
                    });
                    callback(events);
                },
                 eventClick: function(calEvent, jsEvent, view) {
                    console.log(calEvent);
                    //console.log(jsEvent);
                    //console.log(view);
                    $(".showpop").removeClass("showpop")
                      .popover('hide');
                     $(this).popover({
                        title : calEvent.title,
                        content: calEvent.description,
                        placement: 'bottom',
                        container: 'body'
                    })
                     .popover('show')
                     .addClass('showpop');
            }
        });
    }


    $(document).ready(init);
})(jQuery);