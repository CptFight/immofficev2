

var calendar = calendar || {
    calendarObject : false,
    events : []
};

/*********************************
*   @name : bind
*   params : /
*   bind  instance  
*********************************/
calendar.bind = function(){
}


/*********************************
*   @name : init
*   params : /
*   init  instance  
*********************************/
calendar.init = function(){
    calendar.bind();
    calendar.initFullCalendar();
}


/* ----- Tables ----- */
/* ------------------- */
calendar.initFullCalendar = function () {
    
    if(!calendar.calendarObject){
    	

    	var events = [
			{
				id: 999,
				title: 'Repeating Event',
				start: '2017-02-16',
				url : 'http://www.google.be'
			}
		];

        calendar.calendarObject = $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '2017-02-12',
			navLinks: true, // can click day/week names to navigate views
			editable: false,
			locale : 'fr',
			eventLimit: true, // allow "more" link when too many events
			//events: events
			events: base_url()+"index.php/rappels/getEventsJson?user_id="+$('#user_id').val()
		});
    }

};


/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() {     
    calendar.init();
});

