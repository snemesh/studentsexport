//
// alert("fdsf");
// function buttonClicked()
// {
//
//     var arr=$('input:checkbox:checked').map(function() {return this.value ;}).get();
//     $('#arrayOfids').attr('value',arr);
//     alert($('#arrayOfids').attr('value'));
//
// }
/**
 * Created by snemesh on 3/22/17.
 */

$(document).on('change', '#check, #checkAll ', function () {

    var $this = $(this), $chks = $(document.getElementsByName("body")), $all = $chks.filter(".chk-all");

    if ($this.hasClass('chk-all')) {
        $chks.prop('checked', $this.prop('checked'));
    } else switch ($chks.filter(":checked").length) {
        case +$all.prop('checked'):
            $all.prop('checked', false).prop('indeterminate', false);
            break;
        case $chks.length - !!$this.prop('checked'):
            $all.prop('checked', true).prop('indeterminate', false);
            break;
        default:
            $all.prop('indeterminate', true);
    }

    var arrayOfIDs = $('input:checkbox:checked').map(function() {return this.value ;}).get();
    $('#arrayOfids').attr('value',arrayOfIDs);



});



// $("#checkid").bind('click', function(){
//     var arreyOfIDs = $('input:checkbox:checked').map(function() {return this.value ;}).get();
//     $('#arrayOfids').attr('value',arreyOfIDs);
// });

