$(document).on('click', '.js_reply_btn', function () {

    let replyModal = $('#order_reply_modal')
    let status = $(this).data('status');
    let text = $(this).data('text');

    let b_text = replyModal.find('.js_text');
    if (status === 1) {
        if (b_text.hasClass('text-danger'))
            b_text.removeClass('text-danger');

        b_text.addClass('text-success');
        b_text.html(text)

        replyModal.find('.js_status').val(status)
    }
    else {
        if (b_text.hasClass('text-success'))
            b_text.removeClass('text-success');

        b_text.addClass('text-danger');
        b_text.html(text)

        replyModal.find('.js_status').val(status)
    }
    replyModal.modal('show');
});
