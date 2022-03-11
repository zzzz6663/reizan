require('./bootstrap');
require('sweetalert');



$('#deliverd').on('change', function (e) {
    var ele=$(this)
    if(this.checked) {
      $('.dateh').show(400)
    }else{
        $('.dateh').hide(400)
    }

});
$('#ostan').on('change', function (e) {
    var ele=$(this)

    var str= {'ostan':ele.val()}
   var res= lara_ajax('/admin/get_shahr/'+ele.val(),str)
   $('#shahr').html(res.body)
});
$('#productpart').on('change', function (e) {
    $('#part').val(null).trigger('change');

    var ele=$(this)

    var str= {'productpart':ele.val()}
   var res= lara_ajax('/admin/get_part/'+ele.val(),str)
   $('#dls_section').html(res.body)


    // var res1=  lara_ajax('/admin/get_logger/'+ele.val(),str)
    // $('#logger').html(res1.body)


});
if ($('.modal').length){
    $(".modal").iziModal({
        width:800,
        closeOnEscape: true,
        closeButton: true,
        onClosing: function(){
            document.querySelectorAll('video').forEach(vid => vid.pause());

        },
    });
}

$(document).ready(function() {

    $(document).on('click', '.trigger', function (event) {
        event.preventDefault();
        var id =$(this).data('id')
        id=  'modal_'+id
        console.log(id)
        $('#'+id).iziModal('open');
    });
    if ($('.persian').length){
        $(".persian").persianDatepicker({
            initialValue: true,
            persianDigit : false,
            format: 'YYYY-MM-DD',
            autoClose: true,
            initialValueType:'gregorian',
            calendar:{
                persian: {
                    local: 'fa'
                }
            }

        });
    }
    if ($('.persian3').length){
        $(".persian3").persianDatepicker({
            initialValue: false,
            persianDigit : false,
            format: 'YYYY-MM-DD',
            autoClose: true,
            initialValueType:'gregorian',
            calendar:{
                persian: {
                    local: 'fa'
                }
            }

        });
    }
    if ($('.persian2').length){
        $(".persian2").persianDatepicker({
            initialValue: true,
            format: 'YYYY-MM-DD',
            autoClose: true,
            initialValueType:'persian'

        });
    }
    if ($('.persian3').length){
        $(".persian3").persianDatepicker({
            initialValue: false,
            format: 'YYYY-MM-DD',
            autoClose: true,
            initialValueType:'persian'

        });
    }
});
$(document).on('click', '.trigger', function (event) {
    event.preventDefault();
    var el=$(this)
    var id=el.data('id')
    $('#'+'modal_'+id).iziModal('open');
});
$(document).on('click', '.remove_r', function (event) {
    var el=$(this)
    var id=el.data('id')
    var cl=el.data('cl')
    console.log(id)
    console.log(cl)
    $('.'+cl).attr('checked', false);
    $('.'+cl).prop('checked', false);
    // $('input[name='+id+']').prop('checked', false);

});


if ($('.select2').length){
    // $('.select2').select2()
    $('.select2').select2({
        closeOnSelect: false,
        dir: "rtl",

    });
}

if ($('#payam').length){
  var  data=$('#payam').data('de')
    console.log(data)

    CKEDITOR.replace('payam', {
        filebrowserImageBrowseUrl: '/file-manager/ckeditor',

    }).setData(data );
    CKEDITOR.config.contentsLangDirection = 'rtl';

}

$(document).on('click', '#fm1bt', function (event) {
    if (!isCaptchaChecked()){
        noty('لطفا تیک من ربات نیستم را بزنید ')
        return
    }
    $('#fm1').submit()
});
// $(document).on("focusin",".clr",function(){
//     var element= $(this)
//     var val= element.val()
//
//
//
// });
// $(document).on("focusout",".clr",function(){
//     var element= $(this)
//     var val= element.val()
//
//
// });

function isCaptchaChecked() {
    return grecaptcha && grecaptcha.getResponse().length !== 0;
}












// document.addEventListener("DOMContentLoaded", function() {
//
//     document.getElementById('button-image').addEventListener('click', (event) => {
//         event.preventDefault();
//         window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
//     });
// });
//
// // set file link
// function fmSetLink($url) {
//     alert(18)
//     document.getElementById('image_label').value = $url;
// }
