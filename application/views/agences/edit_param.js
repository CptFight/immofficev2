



var edit_param = edit_param || {
    colorpicker : null
};

/*********************************
*   @name : bind
*   params : /
*   bind  instance  
*********************************/
edit_param.bind = function(){
    edit_param.bindColorPicker();

    $('.btn-add').click(function(e){ 
      e.preventDefault();
      var new_elem = $(this).closest('li').clone();
      $(new_elem).find('.btn-add').remove();
      console.log('passe',new_elem);
      $(new_elem.html()).insertBefore($(this).closest('ul').find('.add-element-template'));
      edit_param.bindColorPicker();
    });
}

edit_param.bindColorPicker = function(){
  edit_param.colorpicker.on('changeColor', function(e,color){
    e.preventDefault();
    e.stopPropagation();
      if(color==null) {
        //when select transparent color
        $('.color-fill-icon', $(this)).addClass('colorpicker-color');
      } else {
        $('.color-fill-icon', $(this)).removeClass('colorpicker-color');
        $('.color-fill-icon', $(this)).css('background-color', color);
      }
      
  }); 
}

/*********************************
*   @name : init
*   params : /
*   init  instance  
*********************************/
edit_param.init = function(){
    edit_param.colorpicker = $('.colorpickerjs');
    edit_param.colorpicker.colorpickerplus();
    edit_param.bind();
}

/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() {     
    edit_param.init();
});





$(document).ready(function() {     
    
    
});

