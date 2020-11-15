accordion();
dropDown();
scrollConvention();
$(window).resize(function() {
    accordion();
    dropDown();
});
//accordion function from page Convention
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
// end accordion function from page Convention

/*DropdownList from page CatBody*/
// $(document).on('focus', '.show-list', function() {
//     var $input = $(this);
//     var $checkList = $input.siblings('.check-list'),
//         $checkBoxes = $checkList.find('.check-list__checkbox');
//
//     $checkList.show();
//
//     $checkBoxes.on('change', function() {
//         var inputText = '',
//             checkStatus = 0;
//
//         for (var i = 0; i < $checkBoxes.length; i++) {
//             if ($checkBoxes.eq(i).is(":checked")) {
//                 checkStatus++;
//
//                 if (inputText === '') {
//                     inputText = $checkBoxes.eq(i).val();
//                 } else {
//                     inputText += ', ' + $checkBoxes.eq(i).val();
//                 }
//
//                 $input.val(inputText);
//             } else if (checkStatus === 0) {
//                 $input.val('');
//             }
//         }
//     });
// });
function dropDown(){
    if( $(window).width() <= 601 ){
        $('.yb_selected-body').click(function () {


            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('show');
            $(this).find('.yb-body_list')
                // .show("slide", { direction: "right" }, 1000)
                .slideToggle(200);
        });
        $('.yb_selected-body').focusout(function () {
            $(this).removeClass('show');
            $(this).find('.yb-body_list')
                // .hide("slide", { direction: "right" }, 1000)
                .slideUp(200);
        });
        $('.yb_selected-body .yb-body_list .yb-body_item').click(function () {
            $(".yb_selected-body .yb-body_list .yb-body_item").removeClass("active_body").find('.fa-check').removeClass('active_check'); //remove active class and hide check
            $(this).toggleClass("active_body").find('.fa-check').toggleClass('active_check') //show fa-check

            shoose = $(this).parents('.yb_selected-body').find('.yb-body_choice')
            shoose.text($(this).text())
            if(shoose.text($(this).text())){
                $(this).find('.yb-body_list').hide()
                console.log($(this).find('.yb-body_list'))
            }
        });
    }
}

/*End DropdownList form page CatBody*/
/*Start func from page Convention*/
function scrollConvention() {
    $(document).ready(function(e) {
        //SCROLL TO ANCHOR TAG

        var $root = $('html, body');
        console.log($root)

        $('.yb-scroll_item').click(function(e) {
            e.preventDefault();
            var $gotoid = $(this).prop('id');
            var $justid = $gotoid.replace('goto','');
            if(typeof $("#" + $justid) != undefined){
                // test if target exists
                $root.animate({
                    scrollTop: $("#"+$justid).offset().top - 60  //add static px 60 when scroll down
            }, 1000);
            }
            else{
                $root.animate({
                    scrollTop: $("#"-$justid).offset().top + 60 //add static px 60 when scroll up
                }, 1000);
            }
            return false;
        });
    });
}
/*End func from page Convention*/

$(window).scroll(function(){
    if ($(window).scrollTop() > 450) {
        console.log($(window).scrollTop() > 450)
        $('.yb-scroll_terms').addClass('scroll-fixed'); //Convention page add position fixed when page scroll down
    }
    else {
        $('.yb-scroll_terms').removeClass('scroll-fixed'); //Convention page add position fixed when page scroll down
    }
});

// function resizeImage () {
//     $('.y-current_img img').each(
//         function () {
//             var theWidth = $(this).width();
//             var theHeight = $(this).height();
//             if (theHeight < theWidth ) {
//                 $(this).height('100%');
//                 $(this).width('auto');
//             }
//             else  {
//
//                 $(this).width('100%');
//             }
//
//         });
// }
// resizeImage()




//func from toggle in seo component
// $(document).ready(function() {
//
//     $('.yb_search-visl .drop-target').each(function(i, el){
//         $('.option-target[data-target="' + $(el).attr('data-alias') +'"]').hide();
//     })
//
//     $('.yb_search-visl').on('click', '.drop-target', function(){
//         if($(this).hasClass('active')){
//             $(this).removeClass('active').find('.fas').removeClass('fa-angle-up')
//             $('.option-target[data-target="' + $(this).attr('data-alias') +'"]').stop(true,true).slideToggle(200);
//             // $(this).children().removeClass('fa-angle-up')
//         } else{
//             $(this).addClass('active').find('.fas').addClass('fa-angle-up')
//
//             // $(this).children().addClass('fa-angle-up')
//             $('.option-target[data-target="' + $(this).attr('data-alias') +'"]').slideUp(200);
//
//         }
//     });
// });

$(document).ready(function() {

    $(".option-target").hide();
    // $(".option-target:first").show(); // firs item is open onload page
    $("span.drop-target").click(function(){
        if ($(this).is(".current"))
        {
            $(this).removeClass("current").find('.fas').removeClass('fa-angle-up');
            $(this).next(".option-target").slideUp(400);
        }
        else
        {
            $(".option-target").slideUp(400);
            $("span.drop-target").removeClass("current").find('.fas').removeClass('fa-angle-up');
            $(this).addClass("current").find('.fas').addClass('fa-angle-up');
            $(this).next(".option-target").slideDown(400);
        }
    });
});
