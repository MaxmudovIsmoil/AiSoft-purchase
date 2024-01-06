$(document).ready(function () {

    var showModal = $(document).find('#order_show_modal');

    $('.js_show_btn').on('click', function (e) {
        e.preventDefault();
        showModal.find('.modal-title').html('Show order')
        showModal.modal('show');
    });

});
