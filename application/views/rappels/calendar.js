

var calendar = calendar || {
    calendarObject_month : false,
    calendarObject_week : false,
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
    
    if(!calendar.calendarObject_month){
    	var date = new Date();
    	calendar.calendarObject_month = $('#calendar_month').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek'
			},
			defaultDate: date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate(),
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			locale : 'fr',
			eventLimit: true, // allow "more" link when too many events
			//events: events
			events: base_url()+"index.php/rappels/getEventsJson?user_id="+$('#user_id').val(),
			eventDrop: function(event, delta, revertFunc, jsEvent, ui, view ){
				console.log('passe');
				$.ajax({
			        type: "POST",
			        url: base_url()+"index.php/rappels/update",
			        dataType: 'json',
			        data: {
			            rappel_id : event.id,
			            new_date : event.start.format('X') - 3600
			        },
			        success: function(response){
			          calendar.calendarObject_week.fullCalendar( 'refetchEvents' );
			        }
			    });
            },
            eventClick: function(event) {
            	//console.log('click');
            },
            droppable: true, 
        	drop: function(date, jsEvent, ui, resourceId) {
        		//console.log('drop');
        	}
		});
    }

    if(!calendar.calendarObject_week){
    	var date = new Date();
    	calendar.calendarObject_week = $('#calendar_week').fullCalendar({
			defaultView : 'listDay',
			locale : 'fr',
			eventLimit: true, // allow "more" link when too many events
			events: base_url()+"index.php/rappels/getEventsJson?user_id="+$('#user_id').val(),
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

