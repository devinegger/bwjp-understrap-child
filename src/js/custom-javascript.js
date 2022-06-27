// Add your custom JS here.

(function($) {

    $(document).ready(function($){

        $('.circle-container').click( function() {
            $(this).toggleClass('bg-white');
            $(this).find('.front').toggleClass('d-none');
            $(this).find('.back').toggleClass('d-none');
        });

        $(".quick-exit").on("click", function() {
          window.open("http://weather.com", "_newtab");
          window.location.replace('http://google.com');
        });

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

    });

})( jQuery );
