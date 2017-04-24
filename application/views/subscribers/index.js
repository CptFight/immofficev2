

var subscribers = subscribers || {
    
};

/*********************************
*   @name : init
*   params : /
*   init  instance  
*********************************/
subscribers.init = function(){
     var config = {
        '.chosen-select' : {
           'width' : '100%'
        }  
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
}

/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() {     
    subscribers.init();
    $(".l-alertmail-section:first").addClass("first");
});


