<!DOCTYPE html>
<html>
<head>
	<title>FullCalendar</title>
	<link rel='stylesheet' href='assets/fullcalendar-3.0.1/fullcalendar.css' />
	<script src='assets/fullcalendar-3.0.1/lib/jquery.min.js'></script>
	<script src='assets/fullcalendar-3.0.1/lib/moment.min.js'></script>
	<script src='assets/fullcalendar-3.0.1/fullcalendar.js'></script>
</head>
<body>
<div id='calendar'></div>

<script type="text/javascript">
	$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
        header:{
        	left:'prev,next today',
        	center:'title',
        	right:'month,agendaWeek,agendaDay'
        },
	    events: function(start, end, timezone, callback) {
	        $.ajax({
	            url: 'jsonEventos.php',
	            dataType: 'json',
	            data: {
	                // our hypothetical feed requires UNIX timestamps
	                start: start.unix(),
	                end: end.unix()
	            }	            
	        })	            
	        .done(function( msg ) {            	
	            var events = [];
	            events.push({
	            	title: msg.title,
	                start: msg.start // will be parsed
	            });
	            callback(events);
			})
	    }
    });
    $('#calendar').fullCalendar({
    	weekends: false // will hide Saturdays and Sundays
	});

	$('#calendar').fullCalendar({
	    dayClick: function() {
	        alert('a day has been clicked!');
	    }
	});

});
	/*
	events: [
        {
            title: 'Event1',
            start: '2016-09-30'
        },
        {
            title: 'Event2',
            start: '2016-09-29'
        }
        // etc...
	    ],
	    color: 'yellow',   // an option!
	    textColor: 'black' // an option!
	 */
</script>
</body>
</html>