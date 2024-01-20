/**** ############################## Order detail ############################# **/
function drawTrOrderDetails(detailData) {
    let trs = '';
    const href = window.location.href;
    let updateUrl, deleteUrl;

    $.each(detailData, function(i, data) {
        updateUrl = href + "-detail/update/"+data.id;
        deleteUrl = href + "-detail/delete/"+data.id;

        trs += '<tr class="js_this_tr order-detail-id-'+data.id+'" data-id="'+data.id+'">\n' +
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


function getOrderDetails(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "JSON",
        success: (response) => {
            // console.log('getOrderDetails: ', response)
            if (response.success) {
                drawTrOrderDetails(response.data);
            }
        },
        error: (response) => {
            console.log('error: ', response);
        }
    })
}
/**** ############################## ./Order detail ############################# **/


/**** ############################## Order file ############################## **/
function drawTrOrderFiles(detailData) {
    let trs = '';
    const href = window.location.href;
    let deleteUrl;

    $.each(detailData, function(i, data) {
        deleteUrl = href + "-file/delete/"+data.id;

        trs += '<tr class="js_this_tr file-id-' + data.id + '" data-id="' + data.id + '">\n' +
            '    <td>'+(i+1)+'</td>\n' +
            '    <td>'+data.name+'</td>\n' +
            '    <td><a href="'+window.location.href+'/public/files/'+data.file+'" target="_blank">'+data.file+'</a></td>\n' +
            '    <td class="text-center">\n' +
            '        <a class="text-danger js_delete_file_btn" data-url="' + deleteUrl + '"><i class="fas fa-trash"></i></a>\n' +
            '    </td>\n' +
            '</tr>';
    });
    $('.js_file_tbody').html(trs);
}

function getOrderFiles(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "JSON",
        success: (response) => {
            // console.log('getOrderDetails: ', response)
            if (response.success) {
                drawTrOrderFiles(response.data);
            }
        },
        error: (response) => {
            console.log('error: ', response);
        }
    })
}
/**** ############################## ./Order file ############################## **/


/**** ############################## Order action ############################# **/
function drawTrOrderAction(data) {
    let tr = '';
    $.each(data, function (i, action) {
        tr += '<tr>\n' +
                '<td>'+(i+1)+'</td>\n' +
                '<td>'+action.created_at+'</td>\n' +
                '<td>'+action.user+'</td>\n' +
                '<td>'+action.instance+'</td>\n' +
                '<td>'+action.status+'</td>\n' +
                '<td>'+action.comment+'</td>\n' +
            '</tr>';
    });
    $('.js_order_action_tbody').html(tr);
}

function getOrderActions(orderId,) {
    let url = window.location.href + "/get-action/" + orderId;

    $.ajax({
        type: "GET",
        url: url,
        dataType: "JSON",
        success: (response) => {
            console.log("response",response);
            if (response.success) {
                drawTrOrderAction(response.data);
            }
        },
        error: (response) => {
            console.log('error: ', response);
        }
    })
}
/**** ############################## ./Order action ############################# **/


/**** ############################## Order plan ############################# **/
function drawOrderPlanTr(data, modal) {
    let tr = '';
    $.each(data, function(i, plan) {
        let user = '';
        $.each(plan.users, function(j, userOne) {
            user += userOne.name + ', ';
        });
        tr += '<tr>\n' +
                '<td>' + plan.instance + '</td>\n' +
                '<td>' + plan.stage + '</td>\n' +
                '<td>' + user + '</td>\n' +
            '</tr>';
    });

    modal.find('.js_order_plan_tbody').html(tr);
}
function getOrderPlan(orderId, modal) {
    let url = window.location.href + "/get-plan/" + orderId;

    $.ajax({
        type: "GET",
        url: url,
        dataType: "JSON",
        success: (response) => {
            // console.log('getOrderPlan: ', response);
            if (response.success) {
                drawOrderPlanTr(response.data, modal);
                modal.modal('show');
            }
        },
        error: (response) => {
            console.log('error: ', response);
        }
    })
}
/**** ############################## ./Order plan ############################# **/


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
        getOrderDetails(orderDetailUrl);

        // getOrderFiles(orderDetailUrl);

        getOrderActions(orderId);

        getOrderPlan(orderId, showModal);
    });


});

/**** create order detail **/

