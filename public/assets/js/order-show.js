function drawTr(detailData) {
    let trs = '';
    const href = window.location.href;
    let updateUrl, deleteUrl;

    $.each(detailData, function(i, data) {
        updateUrl = href + "-detail/update/"+data.id;
        deleteUrl = href + "-detail/delete/"+data.id;

        trs += '<tr class="js_this_tr" data-order-detail-id="' + data.id + '">\n' +
            '    <td>'+(i+1)+'</td>\n' +
            '    <td>'+data.name+'</td>\n' +
            '    <td>'+data.count+'</td>\n' +
            '    <td>'+data.pcs+'</td>\n' +
            '    <td>'+data.purpose+'</td>\n' +
            '    <td>'+data.address+'</td>\n' +
            '    <td>'+data.approximate_price+'</td>\n' +
            '    <td class="text-right d-flex justify-content-end">\n' +
            '        <a class="text-primary mr-1 js_edit_order_detail_btn" data-url="' + updateUrl + '"><i class="fas fa-pen"></i></a>\n' +
            '        <a class="text-danger js_delete_order_detail_btn" data-url="'+deleteUrl+'"><i class="fas fa-trash"></i></a>\n' +
            '    </td>\n' +
            '</tr>';
    });
    $('.js_order_detail_tbody').html(trs);
}


function getOrderDetails(url, modal) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "JSON",
        success: (response) => {
            console.log('res: ', response)
            if (response.success) {
                drawTr(response.data);
                modal.modal('show');
            }
        },
        error: (response) => {
            console.log('error: ', response)
        }
    })
}





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

        let orderDetailUrl = $(this).data('orderDetailUrl');
        getOrderDetails(orderDetailUrl, showModal);

    });


});

/**** create order detail **/

