
jQuery(document).ready(function() {
    /* INFINITE BOX HANDLING */
    infiniteboxInit();

});



//////////////////////////////////////
// FUNCTION TO infinitebox HANDLING //
//////////////////////////////////////
function infiniteboxInit() {
    jQuery('.infinitebox').each(function() {
        var ibox=jQuery(this).addClass("closed");

        // CLICKING ON ONE ICON SHOULD OPEN / CLOSE THE BOX
        ibox.find('.ib-draw').each(function(i) {

            var draw=jQuery(this);

            draw.click(function() {
                if (jQuery(window).width()>767) {
                    var ibicon=draw.find('.ib-icon');
                    closeOtherInfinite(ibox.attr('id'));

                    if (ibicon.hasClass('selected')) {
                        ibox.removeClass('opened', 600).addClass("closed", 600);
                        ibox.find('.selected').removeClass("selected");
                    } else {

                        if (ibox.hasClass('opened')) {
                            ibox.removeClass("opened", 600).addClass("closed", 600);
                            setTimeout(function() {
                                ibox.find('.active').removeClass("active", 600);
                                jQuery(draw.data('targetwrap')).addClass("active",600);
                                ibox.addClass("opened", 600).removeClass("closed", 600);
                            },600);
                        } else {
                            ibox.find('.active').removeClass("active");
                            jQuery(draw.data('targetwrap')).addClass("active");
                            ibox.addClass("opened", 600).removeClass("closed", 600);
                        }
                        ibox.find('.selected').removeClass("selected");
                        ibicon.addClass("selected");
                    }
                }
            });

            if (i==0) draw.click();
        });
    });


    jQuery(window).resize(function() {
        if (jQuery(window).width()<980 && jQuery(window).width()>767)  closeOtherInfinite();
    });


}

//////////////////////////////
// CLOSE ALL INFINITE BOX  //
/////////////////////////////
function closeOtherInfinite(current) {

    jQuery('.infinitebox').each(function() {
        var ibox=jQuery(this);

        if (ibox.attr('id')!=current && jQuery(window).width()<980) {

            ibox.find('.ib-draw').each(function() {
                var draw=jQuery(this);
                var ibicon=draw.find('.ib-icon');
                ibox.removeClass('opened').addClass("closed");
                ibox.find('.selected').removeClass("selected");
            });
        }
    });
}

