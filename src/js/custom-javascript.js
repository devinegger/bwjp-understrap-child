// Add your custom JS here.

(function($) {

    $(document).ready(function($){

        $('.search-nav .nav-link').click( function() {
            //alert('hello');
            if(!$(this).hasClass('active')) { // if the clicked nav-link is not active

                let target = $(this).data('target'); // target is results row to show when clicked

                // change tabs
                $('.search-nav .nav-link.active').removeClass('active'); // remove the active class from current active
                $(this).addClass('active'); // give this link active class

                $('.search-results .results.active').removeClass('active') // remove the active class from results row
                $('.search-results .results.'+target).addClass('active') // give target resutls row active class
            }
        });

        // toggle circle container appearance on click
        $('.circle-container').click( function() {
            $(this).toggleClass('bg-white');
            $(this).find('.front').toggleClass('d-none');
            $(this).find('.back').toggleClass('d-none');
        });
        
        // quick exit function
        // - open tab to weather.com
        // - redirect current tab to google.com
        $(".quick-exit").on("click", function() {
          window.open("http://weather.com", "_newtab");
          window.location.replace('http://google.com');
        });

        // show button menus on scroll and on mobile
        $(window).scroll(function() {

            if ($(this).scrollTop()>320) {
                $('.side-menu .quick-exit').removeClass('d-md-none');
                $('.mobile-menu').removeClass('d-md-none');
                $('.navbar-toggler').show();
                $('#main-nav').removeClass('navbar-expand-md');
            } else {
                $('.side-menu .quick-exit').addClass('d-md-none');
                $('.mobile-menu').addClass('d-md-none');
                $('.navbar-toggler').hide();
                $('#main-nav').addClass('navbar-expand-md');
            }
        });

        if (window.location.href.indexOf("/search/") > -1) {
            $('.search').addClass('active');
        }

    });

})( jQuery );


// adding animations
(function($) {

    //* Make sure JS is enabled
    document.documentElement.className = "js";

    $(document).ready( function() {

        //* Run 0.25 seconds after document ready for any instances viewable on load
        setTimeout( function() {
            animateObjects();
        }, 250);
    });

    $(window).scroll( function() {
        //* Run on scroll
        animateObjects();
    });

    function animateObjects() {
        //* Define your object via class
        var objectLeft = $( '.slidein-left-effect' );

        //* Loop through each object in the array
        $.each( objectLeft, function() {

            var windowHeight = $(window).height(),
                offset 		 = $(this).offset().top,
                top			 = offset - $(document).scrollTop(),
                percent 	 = Math.floor( top / windowHeight * 100 );

            if ( percent < 80 ) {

                $(this).addClass( 'slideInLeft' );

            }
        });

        //* Define your object via class
        var objectRight = $( '.slidein-right-effect' );

        //* Loop through each object in the array
        $.each( objectRight, function() {

            var windowHeight = $(window).height(),
                offset 		 = $(this).offset().top,
                top			 = offset - $(document).scrollTop(),
                percent 	 = Math.floor( top / windowHeight * 100 );

            if ( percent < 80 ) {

                $(this).addClass( 'slideInRight' );

            }
        });

    }
})(jQuery);