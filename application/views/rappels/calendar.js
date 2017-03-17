

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
    	var date = new Date();
    	calendar.calendarObject = $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate(),
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			locale : 'fr',
			eventLimit: true, // allow "more" link when too many events
			//events: events
			events: base_url()+"index.php/rappels/getEventsJson?user_id="+$('#user_id').val(),
			eventDrop: function(event, delta, revertFunc, jsEvent, ui, view ){
				$.ajax({
			        type: "POST",
			        url: base_url()+"index.php/rappels/update",
			        dataType: 'json',
			        data: {
			            rappel_id : event.id,
			            new_date : event.start.format('X') - 3600
			        },
			        success: function(response){
			          //  console.log('response',response);
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

};


/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() {     
    calendar.init();
});

