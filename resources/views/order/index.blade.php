@extends('layout.app')

@section('content')
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header mb-1 d-flex justify-content-between">
            <div>
                <div class="badge badge-light-success">All</div>
                <div class="badge badge-light-secondary">Agreed</div>
                <div class="badge badge-light-secondary">Refused</div>
                <div class="badge badge-light-secondary">Under consideration</div>
            </div>
            <div>
                <a href="#" class="btn btn-primary btn-sm js_add_btn">Create Order</a>
            </div>
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <!-- list section start -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="table" id="datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th>№</th>
                                    <th>Author</th>
                                    <th>Instance</th>
                                    <th>Proses</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd">
                                    <td class="control" tabindex="0">1</td>
                                    <td>
                                        <div class="d-flex justify-content-left align-items-center">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-xl mr-1">
                                                    <img src="{{ asset("assets/images/avatars/2-small.png")}}"
                                                         data-toggle="popover" data-placement="top"
                                                         data-container="body" data-original-title="Popover on top"
                                                         data-content="Macaroon chocolate candy."
                                                         alt="Avatar" height="32" width="32">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column"><a href="#" class="user_name text-truncate">
                                                    <span class="font-weight-bold">Zsazsa Cleverty</span></a>
                                                <small class="emp_post text-muted">Finance</small></div>
                                        </div>
                                    </td>
                                    <td class="sorting_1">Content description</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-xl mr-1">
                                                    <img src="{{ asset("assets/images/avatars/1-small.png")}}" alt="Avatar"
                                                         height="32" width="32">
                                                </div>
                                                <i class="fas fa-chevron-right"></i>
                                            </div>
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-xl mr-1 ml-1">
                                                    <img src="{{ asset("assets/images/avatars/2-small.png")}}" alt="Avatar"
                                                         height="32" width="32">
                                                </div>
                                                <i class="fas fa-chevron-right"></i>
                                            </div>
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-xl mr-1 ml-1">
                                                    <img src="{{ asset("assets/images/avatars/3-small.png")}}" alt="Avatar"
                                                         height="32" width="32">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="sorting">Processing</td>
                                    <td>test 2</td>
                                </tr>
                                <tr role="row" class="event">
                                    <td class=" control" tabindex="0">2</td>
                                    <td>
                                        <div class="d-flex justify-content-left align-items-center">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-xl mr-1">
                                                    <img src="{{ asset("assets/images/avatars/1-small.png")}}" alt="Avatar"
                                                         height="32" width="32">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column"><a href="#" class="user_name text-truncate">
                                                    <span class="font-weight-bold">Zsazsa McCleverty</span></a>
                                                <small class="emp_post text-muted">Owner</small></div>
                                        </div>
                                    </td>
                                    <td class="sorting_1">Content description</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-xl mr-1">
                                                    <img src="{{ asset("assets/images/avatars/6-small.png")}}" alt="Avatar"
                                                         height="32" width="32">
                                                </div>
                                                <i class="fas fa-chevron-right"></i>
                                            </div>
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-xl mr-1 ml-1">
                                                    <img src="{{ asset("assets/images/avatars/5-small.png")}}" alt="Avatar"
                                                         height="32" width="32">
                                                </div>
                                                <i class="fas fa-chevron-right"></i>
                                            </div>
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-xl mr-1 ml-1">
                                                    <img src="{{ asset("assets/images/avatars/4-small.png")}}" alt="Avatar"
                                                         height="32" width="32">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-truncate d-flex align-items-center">
                                            <span class="badge bg-label-success">Author</span>
                                        </span>
                                    </td>
                                    <td class="sorting">In process</td>
                                </tr>
                                <tr role="row" class="odd">
                                <td class=" control" tabindex="0">3</td>
                                <td>
                                    <div class="d-flex justify-content-left align-items-center">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1">
                                                <img src="{{ asset("assets/images/avatars/3-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column"><a href="#" class="user_name text-truncate">
                                                <span class="font-weight-bold">Zsazsa McCleverty</span></a>
                                            <small class="emp_post text-muted">Deliver</small></div>
                                    </div>
                                </td>
                                <td class="sorting_1">Content description</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1">
                                                <img src="{{ asset("assets/images/avatars/4-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1 ml-1">
                                                <img src="{{ asset("assets/images/avatars/6-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1 ml-1">
                                                <img src="{{ asset("assets/images/avatars/1-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="sorting">In process</td>
                                <td>Enterprise</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- list section end -->
            </section>

            @include('order.add_modal')
            <!-- users list ends -->
        </div>
    </div>
@stop


@section('script')
    <script>
        function form_clear(form) {
            form.find('.js_name_ru').val('')
            let status = form.find('.js_status option');
            $.each(status, function(i, item) {
                $(item).removeAttr('selected');
            });
        }
        $(document).ready(function() {
            var modal = $(document).find('#add_edit_modal');
            var deleteModal = $('#deleteModal')
            var form = modal.find('.js_add_edit_form');

            var table = $('#datatable').DataTable({
                paging: true,
                pageLength: 20,
                lengthChange: false,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                language: {
                    search: "",
                    searchPlaceholder: " Поиск...",
                    sLengthMenu: "Кўриш _MENU_ тадан",
                    sInfo: "Показаны с _START_ по _END_ из _TOTAL_ записей",
                    emptyTable: "Информация недоступна",
                    sInfoFiltered: "(Отфильтровано из _MAX_ записей)",
                    sZeroRecords: "Информация не найдена",
                    oPaginate: {
                        sNext: "Следующий",
                        sPrevious: "Предыдущий",
                    },
                },
                // processing: true,
                // serverSide: true,
                {{--ajax: {--}}
                {{--    "url": '{{ route("getInstances") }}',--}}
                {{--},--}}
                {{--columns: [--}}
                {{--    {data: 'DT_RowIndex'},--}}
                {{--    {data: 'name_ru'},--}}
                {{--    {data: 'status'},--}}
                {{--    {data: 'action', name: 'action', orderable: false, searchable: false}--}}
                {{--]--}}
            });

            $('.js_add_btn').on('click', function () {
                modal.find('.modal-title').html('Add Order')
                form_clear(form);
                let url = $(this).data('store_url');
                form.attr('action', url);
                modal.modal('show');
            });

            $(document).on('click', '.js_edit_btn', function(e) {
                e.preventDefault();
                modal.find('.modal-title').html('Edit Order')
                let status = form.find('.js_status option')
                let url = $(this).data('one_data_url')
                let update_url = $(this).data('update_url')
                form.attr('action', update_url)
                form_clear(form);

                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: (response) => {
                        form.append("<input type='hidden' name='_method' value='PUT'>");
                        if(response.success) {
                            form.find('.js_name_ru').val(response.data.name)
                            $.each(status, function(i, item) {
                                if(response.data.status === $(item).val()) {
                                    $(item).attr('selected', true);
                                }
                            })
                            modal.modal('show')
                        }
                    },
                    error: (response) => {
                        console.log('error: ',response)
                    }
                });
            })

            $(document).on('submit', '.js_add_form', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    dataType: "json",
                    data: $(this).serialize(),
                    success: (response) => {
                        if(response.success) {
                            modal.modal('hide')
                            form_clear(form)
                            table.draw();
                        }
                    },
                    error: (response) => {
                        if(typeof response.responseJSON.errors !== 'undefined') {
                            form.find('.js_name_ru').addClass('is-invalid')
                        }
                        console.log('error: ', response)
                    }
                });
            });


            $(document).on("click", ".js_delete_btn", function () {
                let name = $(this).data('name')
                let url = $(this).data('url')

                deleteModal.find('.modal-title').html(name)

                let form = deleteModal.find('#js_modal_delete_form')
                form.attr('action', url)
                deleteModal.modal('show');
            });


            $(document).on('submit', '#js_modal_delete_form', function (e) {
                e.preventDefault()
                delete_function(deleteModal, $(this), table);
            });
        });
    </script>
@stop
