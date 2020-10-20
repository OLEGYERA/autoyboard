
accordion();
dropDown();
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
            $(this).find('.yb-body_list').slideToggle(300);
        });
        $('.yb_selected-body').focusout(function () {
            $(this).removeClass('show');
            $(this).find('.yb-body_list').slideUp(300);
        });
        $('.yb_selected-body .yb-body_list .yb-body_item').click(function (e) {

            // $(this).parents('.yb_selected-body').find('.yb-body_choice').text($(this).text());
            // $(this).parents('.yb_selected-body').find('.fa-check').toggleClass('active_check')
            shoose = $(this).parents('.yb_selected-body').find('.yb-body_choice')
            shoose.text($(this).text())
            if( shoose.text($(this).text()) ){
               $(this).parents('.yb_selected-body').find('.yb-body_item ').toggleClass('active_item');
                $(this).parents('.yb_selected-body').find('.fa-check').toggleClass('active_check')
            }
        });
    }
}

/*End DropdownList form page CatBody*/
