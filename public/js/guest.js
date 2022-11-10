jQuery(document).ready(function($){

    // jQuery('#btn-add').click(function () {
    //     jQuery('#btn-save').val("add");
    //     jQuery('#myForm').trigger("reset");
    // });

    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            first_name: jQuery('#first_name').val(),
            last_name: jQuery('#last_name').val(),
            email: jQuery('#email').val(),
            message: jQuery('#message').val(),
        };
        var type = "POST";
        var ajaxurl = 'http://127.0.0.1:8000/guests';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data)
                jQuery('#myForm').trigger("reset");
                window.location.href = 'http://127.0.0.1:8000/guests'
            },
            error: function (data) {
                const response = JSON.parse(data.responseText);
                for(let err of Object.keys(response.errors)) {
                    const msg = '<li>' + response.errors[err] + '</li>';
                    jQuery('#error-list').append(msg);
                }
                jQuery('.alert-danger').show();
                setTimeout(()=>{
                    jQuery('.alert-danger').fadeOut();
                },3000)
            }
        });
    });
});