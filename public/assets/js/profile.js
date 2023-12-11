
$(document).on('click', '#js_profile_btn', function(e) {
    e.preventDefault();
    console.log(11111)
    let modal = $('#profile_modal');
   modal.modal('show');
});


$(document).on('submit', '.js_profile_form', function(e) {
    e.preventDefault();
    let modal = $('#profile_modal');
    let form = $(this);
    let name = form.find('.js_name')
    let phone = form.find('.js_phone')
    let photo = form.find('.js_photo')
    let username = form.find('.js_username')
    let password = form.find('.js_password')

    $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: new FormData(this),
        dataType: "JSON",
        contentType: false,
        processData: false,
        success: (response) => {
            console.log(response)
            if(response.success) {
                modal.modal('hide')
                window.location.reload();
            }
        },
        error: (response) => {
            if(typeof response.responseJSON.errors !== 'undefined') {
                if(response.responseJSON.errors.name) {
                    name.addClass('is-invalid')
                    name.siblings('.invalid-feedback').html(response.responseJSON.errors.name[0])
                }
                if(response.responseJSON.errors.phone) {
                    phone.addClass('is-invalid')
                    phone.siblings('.invalid-feedback').html(response.responseJSON.errors.phone[0])
                }
                if(response.responseJSON.errors.username) {
                    username.addClass('is-invalid')
                    username.siblings('.invalid-feedback').html(response.responseJSON.errors.username[0])
                }
                if(response.responseJSON.errors.password) {
                    password.addClass('is-invalid')
                    password.siblings('.invalid-feedback').html(response.responseJSON.errors.password[0])
                }
                if(response.responseJSON.errors.photo) {
                    photo.addClass('is-invalid')
                    photo.siblings('.invalid-feedback').html(response.responseJSON.errors.photo[0])
                }
            }
            console.log('error: ', response)
        }
    });
});
