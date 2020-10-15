
accordion();
$(window).resize(function() {
    accordion();
});

function accordion(){
    if ( $(window).width() <= 769 ) {
        var btn = $('.yb-title_btn');
        $(btn).on('click', function() {
            e = $(this).closest('.yb-terms_title').find('.yb-subtitle_list');
            e.toggle()
            if(e.toggle){
                m = $(this).closest('.yb-terms_title').find('.yb-title_btn');
                m.toggleClass("br_margin") //toggle margin and border-radius

                u = $(this).closest('.yb-title_btn').find('.term_arrow');
                u.toggleClass("fa-angle-up") //toggle anouther class for arrow
            }
        });
    }
}

