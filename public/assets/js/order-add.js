$(document).on('click', '.js_add_tr_btn', function(e) {
    e.preventDefault();

    let tbody = $('.js_tbody');
    let number = tbody.find('tr').length + 1;
    let tr = '<tr>\n' +
                        '<td>' + number + '</td>\n' +
                        '<td><input type="text" name="name[]" class="form-control js_od_name"/></td>\n' +
                        '<td><input type="number" name="count[]" class="form-control js_od_count"/></td>\n' +
                        '<td><input type="text" name="pcs[]" class="form-control js_od_pcs"/></td>\n' +
                        '<td><input type="text" name="price_source[]" class="form-control"/></td>\n' +
                        '<td><input type="text" name="address[]" class="form-control"/></td>\n' +
                    '</tr>'+
                '</tr>';

    tbody.append(tr);
});

$(document).on('click', '.js_remove_tr_btn', function(e) {
    e.preventDefault();

    let tbody = $('.js_tbody');
    let number = tbody.find('tr').length;
    if (number > 1)
        tbody.find('tr').last().remove();

});


// every 10 minutes page refresh
let setTime = setTimeout(function(){
    window.location.reload();
}, 600000);

let modal = $('#order_add_modal');
modal.on('show.bs.modal', function() {
    clearTimeout(setTime);
});
modal.on('hidden.bs.modal', function() {
    setTime = setTimeout(function(){
        window.location.reload();
    }, 600000);
});

// order add
var addModal = $(document).find('#order_add_modal');
var addForm = addModal.find('.js_add_form');

$('.js_add_btn').on('click', function (e) {
    e.preventDefault();
    addModal.find('.modal-title').html('Add Order');
    addModal.modal('show');
});

addForm.on('submit', function (e) {
    e.preventDefault();
    let theme = $(this).find('.js_theme')
    $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: new FormData(this),
        dataType: "JSON",
        contentType: false,
        processData: false,
        success: (response) => {
            // console.log('res: ', response)
            if (response.success === true)
                window.location.reload();
        },
        error: (response) => {
            console.log('order-add-error: ', response)
            if(typeof response.responseJSON !== 'undefined') {
                if (response.responseJSON.error === "requiredTheme") {
                    theme.addClass('is-invalid')
                    theme.siblings('.invalid-feedback').html('theme required')
                }

                if (response.responseJSON.error === "userPlanEmpty") {
                    $('#warning').modal('show');
                }
            }
        }
    })
});
