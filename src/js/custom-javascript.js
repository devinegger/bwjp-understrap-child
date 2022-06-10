// Add your custom JS here.

(function($) {

    $(document).ready(function($){

        $('.circle-container').click( function() {
            $(this).toggleClass('bg-white');
            $(this).find('.front').toggleClass('d-none');
            $(this).find('.back').toggleClass('d-none');
        });

    });

})( jQuery );
