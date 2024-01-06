
$('body').delegate('.js_add_order_detail_btn', 'click', function (e) {
    e.preventDefault();
    let modal = $('#add_order_detail_modal')
    modal.find('.modal-title').html('Order detail')
    modal.modal('show');
});
