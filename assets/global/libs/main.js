/* ==|====================
   Main/JS
   ======================= */


/* ------ Dropdown ------*/
/* --------------------- */
$(".btn-dropdown").on("click", function(){
	var id = $(this).attr("data-id");
	$("#"+id).toggleClass("hidden");
});

/* ------ Nav Toggle ---------- */
/* ---------------------------- */
$("#btn-toggle-nav").on("click" , function(){
	$(".l-nav-aside").toggleClass("hide");
	if($(".content").hasClass("move"))
	{
		$(".content").toggleClass("move remove");
	}
	else 
	{
		$(".content").addClass("move");
		$(".content").removeClass("remove");
	}
});
$(".l-nav-big a").on("click" , function(){
	$(".l-nav-aside").toggleClass("hide");
	$(".content").toggleClass("move remove");
	
});

/* ------ Smooth Scroll ---- */
/* ---------------------------- */
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});