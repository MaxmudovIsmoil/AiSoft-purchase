
$('body').delegate('.js_add_file_btn', 'click', function (e) {
    e.preventDefault();
    let modal = $('#add_file_modal')
    modal.find('.modal-title').html('Add file')
    modal.modal('show');
});
