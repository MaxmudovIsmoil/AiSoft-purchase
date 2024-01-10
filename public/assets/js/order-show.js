$(document).ready(function () {

    var showModal = $(document).find('#order_show_modal');

    $('.js_show_btn').on('click', function (e) {
        e.preventDefault();
        let this_tr = $(this).closest('.js_this_tr');
        let orderId = this_tr.data('orderId');
        showModal.attr('data-order-id', orderId);

        if (this_tr.hasClass('js_action_btn_check')) {
            showModal.find('.action-div').removeClass('d-none');
        }
        else {
            showModal.find('.action-div').addClass('d-none');
        }
        showModal.find('.modal-title').html('Show order');
        showModal.modal('show');
    });

});
