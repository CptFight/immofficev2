
$(document).ready(function() {     
    var colorpicker = $('.colorpickerjs');
    colorpicker.colorpickerplus();
    colorpicker.on('changeColor', function(e,color){
        if(color==null) {
          //when select transparent color
          $('.color-fill-icon', $(this)).addClass('colorpicker-color');
        } else {
          $('.color-fill-icon', $(this)).removeClass('colorpicker-color');
          $('.color-fill-icon', $(this)).css('background-color', color);
        }
        
    });  
});

