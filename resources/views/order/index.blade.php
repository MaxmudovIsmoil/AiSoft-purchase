@extends('layout.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/order.css') }}"/>
@stop
@section('content')
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header mb-1 d-flex justify-content-between">
            <div>
                <div class="badge badge-light-success" role="button">All</div>
                <div class="badge badge-light-secondary" role="button">Accepted</div>
                <div class="badge badge-light-secondary" role="button">Declined</div>
                <div class="badge badge-light-secondary" role="button">Completed</div>
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
                    <div class="card-datatable table-responsive">
                        <table class="table order-table" id="datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th width="2%">№</th>
                                    <th>Author</th>
                                    <th>Theme</th>
                                    <th>Current Instance</th>
                                    <th>Process</th>
                                    <th>Status</th>
                                    <th class="text-center" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr class="js_this_tr @if(($order->current_stage == $order->up_stage && !in_array($order->up_user_instance_id, $userInstanceIds) && $order->status->isAccepted())/* || ($order->user_id == Auth::id() && $order->status->isAccepted())*/)
                                 bg-light-danger js_action_btn_check
                                 @elseif(($order->user_id == Auth::id() && $order->status->isGoBack())||(!in_array($order->up_user_instance_id, $userInstanceIds) && $order->status->isGoBack()) )
                                 bg-light-warning
                                    @if($order->user_id == Auth::id() && $order->status->isGoBack() ) js_action_btn_check @endif
                                 @endif"
                                    data-order-id="{{ $order->order_id }}">
                                    <td class="control">{{ ++$loop->index }}</td>
                                    <td>
                                        <div class="d-flex justify-content-left align-items-center">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-xl mr-1">
                                                    <img src="{{ asset("assets/images/".$order->user->photo)}}"
                                                         alt="Avatar" height="32" width="32">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column"><a href="#" class="user_name text-truncate">
                                                    <span class="font-weight-bold">{{ $order->user->name }}</span></a>
                                                <small class="emp_post text-muted">{{$order->instance->name_ru}}</small></div>
                                        </div>
                                    </td>
                                    <td>{{ $order->theme }}</td>
                                    <td>{{ $order->currentInstance->name_ru }}</td>
                                    <td class="text-center pt-0 pb-0">
                                        <div class="card mb-0 order-action-process">
                                            <div class="card-header">
                                                <div class="avatar bg-light-success avatar-lg js_accordion_btn" data-url="{{ route('order.getOrderActionComments', [$order->order_id]) }}">
                                                    <span class="avatar-content">{{ $order->current_stage }}/{{ $order->stage_count }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span @class([
                                            "badge",
                                            'badge-light-success' => $order->status->isAccepted(),
                                            'badge-light-warning' => $order->status->isGoBack(),
                                            'badge-light-danger' => $order->status->isDeclined(),
                                            'badge-light-info' => $order->status->isCompleted(),
                                        ])>
                                            {{ $order->status->getLabelText() }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="show-btn js_show_btn"
                                        data-order-detail-url="{{ route('order_detail.getOne', [$order->order_id]) }}"
                                        ><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="p-0 order-comment-div">
                                        <div class="card collapse js_order_collapse">
                                            <div class="card-body"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $orders->links() }}
                </div>
                <!-- list section end -->
            </section>

            @include('order.modals.add_order_modal')

            @include('order.modals.show_modal')

            @include('order.modals.reply_modal')

            @include('order.modals.add_order_detail_modal')

            @include('order.modals.add_file_modal')

            @include('order.modals.warning_modal')
            <!-- users list ends -->
        </div>
    </div>
@stop


@section('script')
    <script src="{{ asset('assets/js/order-add.js') }}"></script>
    <script src="{{ asset('assets/js/order-action.js') }}"></script>
    <script src="{{ asset('assets/js/order-show.js') }}"></script>
    <script src="{{ asset('assets/js/order-reply.js') }}"></script>
    <script src="{{ asset('assets/js/order-detail.js') }}"></script>
    <script src="{{ asset('assets/js/order-file.js') }}"></script>
@stop
