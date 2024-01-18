function addNewTr(data) {

    let length = $('.js_order_detail_tbody tr').length + 1;
    const href = window.location.href;
    const updateUrl = href + "-detail/update/" + data.id;
    const deleteUrl = href + "-detail/delete/" + data.id;
    let tr = '<tr class="js_this_tr" data-order-detail-id="' + data.id + '">\n' +
        '    <td>'+length+'</td>\n' +
        '    <td>'+data.name+'</td>\n' +
        '    <td>'+data.count+'</td>\n' +
        '    <td>'+data.pcs+'</td>\n' +
        '    <td>'+data.purpose+'</td>\n' +
        '    <td>'+data.address+'</td>\n' +
        '    <td>'+data.approximate_price+'</td>\n' +
        '    <td class="text-right d-flex justify-content-end">\n' +
        '        <a class="text-primary mr-1 js_edit_order_detail_btn" data-url="' + updateUrl + '"><i class="fas fa-pen"></i></a>\n' +
        '        <a class="text-danger js_delete_order_detail_btn" data-url="' + deleteUrl + '"><i class="fas fa-trash"></i></a>\n' +
        '    </td>\n' +
        '</tr>';

    $('.js_order_detail_tbody').append(tr);
}

function editThisTr(orderDetailId, data) {
    let trs = $('.js_order_detail_tbody tr');
    $.each(trs, function(i, tr){
        if ($(tr).data('orderDetailId') == orderDetailId) {
            $(tr).find('td:nth-child(2)').html(data.name);
            $(tr).find('td:nth-child(3)').html(data.count);
            $(tr).find('td:nth-child(4)').html(data.pcs);
            $(tr).find('td:nth-child(5)').html(data.purpose);
            $(tr).find('td:nth-child(6)').html(data.address);
            $(tr).find('td:nth-child(7)').html(data.approximate_price);
        }
    });
}

$(document).ready(function() {

    var body = $('body');

    body.delegate('.js_add_order_detail_btn', 'click', function (e) {
        e.preventDefault();
        let storeUrl = $(this).data('url')
        let modal = $('#add_edit_order_detail_modal');
        let orderId = $('#order_show_modal').data('orderId');
        let form = modal.find('.js_add_edit_order_detail_form');

        modal.find('.modal-title').html('Add order detail');
        form.attr('action', storeUrl)
        form.attr('data-action-type', 1);
        form.find('.js_order_id').val(orderId);

        modal.modal('show');
    });

    // edit
    body.delegate('.js_edit_order_detail_btn', 'click', function (e) {
        e.preventDefault();
        let modal = $('#add_edit_order_detail_modal');
        let orderId = $('#order_show_modal').data('orderId');

        let updateUrl = $(this).data('url');
        let form = modal.find('.js_add_edit_order_detail_form');
        form.attr('action', updateUrl);
        form.attr('data-action-type', 2);

        let tr = $(this).closest('.js_this_tr');
        let orderDetailId = tr.data('orderDetailId');
        form.attr('data-order-detail-id', orderDetailId);

        let name = tr.find('td:nth-child(2)').html();
        let count = tr.find('td:nth-child(3)').html();
        let pcs = tr.find('td:nth-child(4)').html();
        let purpose = tr.find('td:nth-child(5)').html();
        let address = tr.find('td:nth-child(6)').html();
        let approximate_price = tr.find('td:nth-child(7)').html();

        form.find('.js_order_id').val(orderId);
        form.find('.js_name').val(name);
        form.find('.js_count').val(count);
        form.find('.js_pcs').val(pcs);
        form.find('.js_purpose').val(purpose);
        form.find('.js_address').val(address);
        form.find('.js_approximate_price').val(approximate_price);

        modal.find('.modal-title').html('Edit order detail ')
        modal.modal('show');
    });


    // add or edit
    body.delegate('.js_add_edit_order_detail_form', 'submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let modal = form.closest('#add_edit_order_detail_modal');
        let actionType = form.data('actionType');
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            dataType: "JSON",
            success: (response) => {
                console.log('res: ', response)
                if (response.success) {
                    if (actionType == 1) {
                        // store
                        addNewTr(response.data);
                    }
                    else {
                        // update 2
                        let orderDetailId = form.data('orderDetailId');
                        editThisTr(orderDetailId, response.data);
                    }
                    modal.find('input[type="text"]').val('');
                    modal.find('input[type="number"]').val('');
                    modal.modal('hide');
                }
            },
            error: (response) => {
                console.log('error: ', response);
                if(typeof response.responseJSON.errors !== 'undefined') {
                    let name = form.find('.js_name');
                    let count = form.find('.js_count');
                    let pcs = form.find('.js_pcs');
                    let purpose = form.find('.js_purpose');
                    let address = form.find('.js_address');
                    let approximate_price = form.find('.js_approximate_price');

                    if(response.responseJSON.errors.name) {
                        name.addClass('is-invalid')
                        name.siblings('.invalid-feedback').html(response.responseJSON.errors.name[0])
                    }
                    if(response.responseJSON.errors.count) {
                        count.addClass('is-invalid')
                        count.siblings('.invalid-feedback').html(response.responseJSON.errors.count[0])
                    }
                    if(response.responseJSON.errors.purpose) {
                        purpose.addClass('is-invalid')
                        purpose.siblings('.invalid-feedback').html(response.responseJSON.errors.purpose[0])
                    }
                    if(response.responseJSON.errors.address) {
                        address.addClass('is-invalid')
                        address.siblings('.invalid-feedback').html(response.responseJSON.errors.address[0])
                    }
                    if(response.responseJSON.errors.pcs) {
                        pcs.addClass('is-invalid')
                        pcs.siblings('.invalid-feedback').html(response.responseJSON.errors.pcs[0])
                    }
                    if(response.responseJSON.errors.approximate_price) {
                        approximate_price.addClass('is-invalid')
                        approximate_price.siblings('.invalid-feedback').html(response.responseJSON.errors.approximate_price[0])
                    }
                }
            }
        });
    });


});
