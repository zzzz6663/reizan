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

$('#show_msg').on('click', function (e) {


});
$('#productpart').on('change', function (e) {
    $('#dls').val(null).trigger('change');

    var ele=$(this)

    var str= {'productpart':ele.val()}
   var res= lara_ajax('/admin/get_part/'+ele.val(),str)
   console.log(res.body)

//    $('#dls').html(res)

   res.body.forEach(function(obj) {
    var newOption = new Option(obj.name, obj.id, false, false);
$('#dls').append(newOption).trigger('change');



   });
    // var res1=  lara_ajax('/admin/get_logger/'+ele.val(),str)
    // $('#logger').html(res1.body)


});
if ($('.modal').length){
    // $('#qr-reader__camera_selection option:last').prop('selected', true);

}
if ($('.modal').length){
    $(".modal").iziModal({
        width:800,
        closeOnEscape: true,
        closeButton: true,
        padding: 20,
        theme: 'light', // dark
    color: 'red', // blue, red, green, yellow
        onClosing: function(){
            document.querySelectorAll('video').forEach(vid => vid.pause());

        },
    });
}

$(document).ready(function() {

    document.addEventListener('play', function(e){
        var audios = document.getElementsByTagName('audio');
        for(var i = 0, len = audios.length; i < len;i++){
            if(audios[i] != e.target){
                audios[i].pause();
            }
        }
    }, true);

    $("#start_button").click(function () {
        startRecord();
        $(this).hide();
        $("#stop_button").removeClass("disnon");

    });
    let audioBlob
    let barcode;
    function startRecord() {
              navigator.mediaDevices.getUserMedia({ audio: true })
            .then(stream => {
                const mediaRecorder = new MediaRecorder(stream);
                mediaRecorder.start();

                const audioChunks = [];
                mediaRecorder.addEventListener("dataavailable", event => {
                    audioChunks.push(event.data);
                });




                $("#stop_button").click(function () {
                    stream.getTracks() // get all tracks from the MediaStream
                        .forEach( track => track.stop() );
                    mediaRecorder.stop();
                    $(this).hide();
                    barcode= $("#stop_button").data('barcode');

                    console.log(barcode)
                    $("#start_button").show('fade');
                    $("#start_gif").hide();
                    $("#stop_gif").show('fade');
                    setTimeout(function () {
                        $("#stop_gif").hide('fade');
                    },4000)
                });

                mediaRecorder.addEventListener("stop", () => {
                     audioBlob = new Blob(audioChunks);



                });
            });


    }

    $(".sendv").click(function () {
      let  location= $(this).data('lo');
      let url= $(this).data('url');
            console.log(location)
            console.log(url)
            console.log(audioBlob)
            if(audioBlob){
                createDownloadLink(audioBlob,barcode,location,url);
            }else{
                window.location.href=url
            }
    });


    function createDownloadLink(blob,barcode,location,url) {


        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function() {
            var base64data = reader.result;


            var file = dataURLtoFile(base64data,Date.now()+'.wav');


            var data = new FormData();
            data.append('voice', file,file.name);
            $.ajax({
                url: '/record_voice/'+barcode+'?location='+location,
                type:'POST',
                headers:{
                    'X-CSRF-TOKEN':document.head.querySelector('meta[name="csrf-token"]').content,
                    // 'Content-Type':'application/json,charset=utf-8'
                },
                data: data,
                contentType: false,
                processData: false,
                success: function(data){
                  noty('صدا با موفقیت ارسال شد ','green','پیام')
                //   location.reload();
                window.location.href=url

                },
                error:function (err) {
                    console.log(data)
                }
            });
        }

    }

    function dataURLtoFile(dataurl, filename) {

        var arr = dataurl.split(','),
            mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]),
            n = bstr.length,
            u8arr = new Uint8Array(n);

        while(n--){
            u8arr[n] = bstr.charCodeAt(n);
        }

        return new File([u8arr], filename, {type:mime});
    }

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

    if(id==1){

        var deliver=$('#deliver').val()
        var cname=$( "#customer option:selected" ).text();
        console.log(deliver)
        $('#msm').removeClass('disnon')

        $('#cname').text(cname)
        $('#dtate').text(deliver.split("-").reverse().join("-"))
        $('#myes').on('click', function (e) {
            $('#barcode_edit_form').submit()
        })
       $('#mno').on('click', function (e) {
           console.log('close')
        $('.modal').iziModal('close');
        })

    }
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
