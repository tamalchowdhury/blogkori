( function( $ ) {
    // Codes here.
    wp.customize('theme_accent_color', function(value) {
        value.bind(function(to) {
            $('#nav, .navbar-default').css({
                'background-color': to,
            });
            $('.sticky').css({
                'border-left-color': to
            });

        });
    });

    wp.customize('theme_link_color', function(value) {
        value.bind(function(to) {
            $('#header a, #content-box a, #footer a').css({
                'color': to
            });

            $('.navbar-default .navbar-nav > .active > a').css({
                'background-color': to
            });
        });

    });
} )( jQuery );
