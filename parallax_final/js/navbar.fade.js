 // $(function(){
 //        // Check the initial Poistion of the Sticky Header
 //        var stickyHeaderTop = $('#nav').offset().top;
 
 //        $(window).scroll(function(){
 //                if( $(window).scrollTop() > stickyHeaderTop ) {
 //                        $('#nav').css({position: 'fixed', top: '0px'});
 //                        $('#nav').css('opacity', '1');
 //                } else {
 //                        $('#nav').css({position: 'static', top: '100px'});
 //                        $('#nav').css('opacity', '0');
 //                }
 //            });
 //        });

 $("#header").hide();
$(window).scroll(function() {
    if ($(window).scrollTop() > 120) {
        $("#header").fadeIn("slow");
    }
    else {
        $("#header").fadeOut("slow");
    }
});




