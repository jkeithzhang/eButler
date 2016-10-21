$(window).load(function() {
  $(".loader").hide();
})

$.getJSON('ajax/ajax_dailyFetch.php', function(data) {
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    // weekends: false,
    editable: false,
    events: data,
    dayClick: function() {
        alert('a day has been clicked!');
    }
    // dayRender: function (date, cell) {
        
    //     var today = new Date();
    //     var end = new Date();
    //     var passin_date = new Date(date);

    //     end.setDate(today.getUTCDate()+7);      
    //     if(passin_date.getUTCDate() == 19) {
    //       // console.log("==>"+passin_date);
    //       cell.css("background-color", "LightGreen");
    //     }

    // }
  });
});
