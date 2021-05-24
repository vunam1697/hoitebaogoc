$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

$(document).ready(function() {

    $('.btn_contactform').click(function(e) {

        e.preventDefault();

        $('.loadingcover').show();

        var data = new FormData($('#frm_contact')[0]);

        $.ajax({

            type: 'POST',

            url: urlContact,

            dataType: "json",

            contentType: false,

            processData: false,

            data: data,

            success: function(data) {

                if (data.message_name) {
                    $('.fr-error').css('display', 'block');
                    $('#error_name').html(data.message_name);
                } else {
                    $('#error_name').html('');
                }

                if (data.message_email) {
                    $('.fr-error').css('display', 'block');
                    $('#error_email').html(data.message_email);
                } else {
                    $('#error_email').html('');
                }

                if (data.message_phone) {
                    $('.fr-error').css('display', 'block');
                    $('#error_phone').html(data.message_phone);
                } else {
                    $('#error_phone').html('');
                }

                if (data.message_address) {
                    $('.fr-error').css('display', 'block');
                    $('#error_address').html(data.message_address);
                } else {
                    $('#error_address').html('');
                }

                if (data.message_topic) {
                    $('.fr-error').css('display', 'block');
                    $('#error_topic').html(data.message_topic);
                } else {
                    $('#error_topic').html('');
                }

                if(data.message_myfile){
                    $('.fr-error').css('display', 'block');
                    $('#error_myfile').html(data.message_myfile);
                } else {
                    $('#error_myfile').html('');
                }

                if (data.message_content) {
                    $('.fr-error').css('display', 'block');
                    $('#error_content').html(data.message_content);
                } else {
                    $('#error_content').html('');
                }
                
                if (data.message_captchacode) {
                    $('.fr-error').css('display', 'block');

                    $('#error_captchacode').html(data.message_captchacode);
                } else {
                    $('#error_captchacode').html('');
                }

                if (data.success) {

                    $('#frm_contact')[0].reset();

                    toastr["success"](data.success, data.notification);

                }

                $('.loadingcover').hide();

            }

        });

    });

});