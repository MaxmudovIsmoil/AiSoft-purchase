
/** modal close inputs in clear **/
$('#add_edit_modal button[data-dismiss="modal"]').click(function () {

    let form = $('.js_add_edit_form')

    let username = form.find('.js_username')
    if(username) {
        username.val('')
        username.removeClass('is-invalid')
        username.siblings('.invalid-feedback').addClass('valid-feedback')
    }

    let password = form.find('.js_password')
    if(password) {
        password.val('')
        password.removeClass('is-invalid')
        password.siblings('.invalid-feedback').addClass('valid-feedback')
    }

    // instance
    let name_ru = form.find('.js_name_ru')
    if(name_ru) {
        name_ru.val('')
        name_ru.removeClass('is-invalid')
        name_ru.siblings('.invalid-feedback').addClass('valid-feedback')
    }

    let name = form.find('.js_name')
    if(name) {
        name.val('')
        name.removeClass('is-invalid')
        name.siblings('.invalid-feedback').addClass('valid-feedback')
    }

})


$('#add_order_modal button[data-dismiss="modal"]').click(function () {

    let form = $('.js_add_form')

    form.find('.js_copy_to_email').val([]);
    form.find('.js_copy_to_email').trigger('change');

    let comment = form.find('textarea')
    comment.val('')

    let inputs = form.find('input[type="text"]')
    inputs.val('')

});



$('.js_username').on('input', function () {
    $(this).removeClass('is-invalid')
    $(this).siblings('.invalid-feedback').addClass('valid-feedback')
})

$('.js_password').on('input', function () {
    $(this).removeClass('is-invalid')
    $(this).siblings('.invalid-feedback').addClass('valid-feedback')
})

$('.js_password_confirmation').on('input', function () {
    $(this).removeClass('is-invalid')
    $(this).siblings('.invalid-feedback').addClass('valid-feedback')
})


// instance
$('.js_name_ru').on('input', function () {
    $(this).removeClass('is-invalid')
    $(this).siblings('.invalid-feedback').addClass('valid-feedback')
})


$('.js_name').on('input', function () {
    $(this).removeClass('is-invalid')
    $(this).siblings('.invalid-feedback').addClass('valid-feedback')
});

$('.js_phone').on('input', function () {
    $(this).removeClass('is-invalid')
    $(this).siblings('.invalid-feedback').addClass('valid-feedback')
});

$('.js_photo').on('change', function () {
    $(this).removeClass('is-invalid')
    $(this).siblings('.invalid-feedback').addClass('valid-feedback')
});
