$(document).ready(function(){
    //smooth scrolling
    
	$('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') 
	        || location.hostname === this.hostname) {

	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	           if (target.length) {
	             $('html,body').animate({
	             	// Offset the scroll position by -60 pixels to account for the fixed top bar
	                 scrollTop: target.offset().top - 60
	            }, 600);
	            return false;
	        }
	    }
	});   
   //scrollspy via js
   $("#nav").scrollspy({ target: '#section-menu'});
   // Parallax 
   $('#mybg').parallax({imageSrc: 'images/jellyfish_wallpaper_by_synthesys.jpg'});
   
});

/*
$(window).on("load", function(){
    $(window).scroll(function() {
      $(".three columns").each(function() {
         var objBottom = $(this).offset().top + $(this).outerHeight();
         var winBottom = $(window).scrollTop() + $(window).innerHeight();
         
         if(objBottom < winBottom) {
             
         
             $(this).removeClass("wow fadeOut");
             $(this).addClass("wow slideInLeft");
             
         }
         else {
             
             $(this).removeClass("wow slideInLeft");
             $(this).addClass("wow fadeOut");
             
             
         }
      });
   }); $(window).scroll();
    
});
*/