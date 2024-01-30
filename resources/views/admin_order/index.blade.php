@extends('layout.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/order.css') }}"/>
@stop
@section('content')
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header mb-1 d-flex justify-content-between">

            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#orderAll" aria-controls="orderAll" role="tab" aria-selected="true">{{__("admin.All")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="accepted-tab" data-toggle="tab" href="#orderAccepted" aria-controls="orderAccepted" role="tab" aria-selected="false">{{__("admin.Accepted")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="GoBack-tab" data-toggle="tab" href="#orderGoBack" aria-controls="orderGoBack" role="tab" aria-selected="true">{{__("admin.Declined")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="completed-tab" data-toggle="tab" href="#orderCompleted" aria-controls="orderCompleted" role="tab" aria-selected="false">{{__("admin.Completed")}}</a>
                </li>
            </ul>

        </div>
        <div class="content-body">
            <!-- users list start -->
            <div class="tab-content">
                <div class="tab-pane active" id="orderAll" aria-labelledby="orderAll-tab" role="tabpanel">
                    <section class="app-user-list">
                        <!-- list section start -->
                        <div class="card">
                            <div class="card-datatable table-responsive">
                                <table class="table order-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="2%">№</th>
                                            <th>{{__("admin.Author")}}</th>
                                            <th>{{__("admin.Theme")}}</th>
                                            <th>{{__("admin.Current Instance")}}</th>
                                            <th>{{__("admin.Process")}}</th>
                                            <th>{{__("admin.Status")}}</th>
                                            <th class="text-center" width="10%">{{__("admin.Action")}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderAll as $order)
                                        <tr class="js_this_tr
                                        @if(($order->current_stage == $order->up_stage && $order->status->isAccepted()))
                                            bg-light-danger
                                        @elseif($order->status->isGoBack()) bg-light-warning @endif"
                                            data-order-id="{{ $order->order_id }}">
                                            <td class="control">{{ ++$loop->index }}</td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-xl mr-1">
                                                            <img src="{{ asset("storage/photos/".$order->user->photo)}}"
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
                                                data-detail-url="{{ route('order_detail.getOne', [$order->order_id]) }}"
                                                data-file-url="{{ route('order_files', [$order->order_id]) }}"
                                                data-action-url="{{ route('order_action', [$order->order_id]) }}"
                                                data-plan-url="{{ route('order_plan', [$order->order_id]) }}"
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
                            {{ $orderAll->links() }}
                        </div>
                        <!-- list section end -->
                    </section>
                </div>
                <div class="tab-pane" id="orderAccepted" aria-labelledby="orderAccepted-tab" role="tabpanel">
                    <section class="app-user-list">
                        <!-- list section start -->
                        <div class="card">
                            <div class="card-datatable table-responsive">
                                <table class="table order-table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th width="2%">№</th>
                                        <th>{{__("admin.Author")}}</th>
                                        <th>{{__("admin.Theme")}}</th>
                                        <th>{{__("admin.Current Instance")}}</th>
                                        <th>{{__("admin.Process")}}</th>
                                        <th>{{__("admin.Status")}}</th>
                                        <th class="text-center" width="10%">{{__("admin.Action")}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderAccepted as $order)
                                        <tr class="js_this_tr @if($order->current_stage == $order->up_stage) bg-light-danger @endif"
                                            data-order-id="{{ $order->order_id }}">
                                            <td class="control">{{ ++$loop->index }}</td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-xl mr-1">
                                                            <img src="{{ asset("storage/photos/".$order->user->photo)}}"
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
                                                   data-detail-url="{{ route('order_detail.getOne', [$order->order_id]) }}"
                                                   data-file-url="{{ route('order_files', [$order->order_id]) }}"
                                                   data-action-url="{{ route('order_action', [$order->order_id]) }}"
                                                   data-plan-url="{{ route('order_plan', [$order->order_id]) }}"
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
                            {{ $orderAccepted->links() }}
                        </div>
                        <!-- list section end -->
                    </section>
                </div>
                <div class="tab-pane" id="orderGoBack" aria-labelledby="orderGoBack-tab" role="tabpanel">
                    <section class="app-user-list">

                        <div class="card">
                            <div class="card-datatable table-responsive">
                                <table class="table order-table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th width="2%">№</th>
                                        <th>{{__("admin.Author")}}</th>
                                        <th>{{__("admin.Theme")}}</th>
                                        <th>{{__("admin.Current Instance")}}</th>
                                        <th>{{__("admin.Process")}}</th>
                                        <th>{{__("admin.Status")}}</th>
                                        <th class="text-center" width="10%">{{__("admin.Action")}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderGoBack as $order)
                                        <tr class="js_this_tr bg-light-warning"
                                            data-order-id="{{ $order->order_id }}">
                                            <td class="control">{{ ++$loop->index }}</td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-xl mr-1">
                                                            <img src="{{ asset("storage/photos/".$order->user->photo)}}"
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
                                                   data-detail-url="{{ route('order_detail.getOne', [$order->order_id]) }}"
                                                   data-file-url="{{ route('order_files', [$order->order_id]) }}"
                                                   data-action-url="{{ route('order_action', [$order->order_id]) }}"
                                                   data-plan-url="{{ route('order_plan', [$order->order_id]) }}"
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
                            {{ $orderGoBack->links() }}
                        </div>

                    </section>
                </div>
                <div class="tab-pane" id="orderCompleted" aria-labelledby="orderCompleted-tab" role="tabpanel">
                    <section class="app-user-list">
                        <div class="card">
                            <div class="card-datatable table-responsive">
                                <table class="table order-table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th width="2%">№</th>
                                        <th>{{__("admin.Author")}}</th>
                                        <th>{{__("admin.Theme")}}</th>
                                        <th>{{__("admin.Current Instance")}}</th>
                                        <th>{{__("admin.Process")}}</th>
                                        <th>{{__("admin.Status")}}</th>
                                        <th class="text-center" width="10%">{{__("admin.Action")}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderCompleted as $order)
                                        <tr class="js_this_tr"
                                            data-order-id="{{ $order->order_id }}">
                                            <td class="control">{{ ++$loop->index }}</td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-xl mr-1">
                                                            <img src="{{ asset("storage/photos/".$order->user->photo)}}"
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
                                                   data-detail-url="{{ route('order_detail.getOne', [$order->order_id]) }}"
                                                   data-file-url="{{ route('order_files', [$order->order_id]) }}"
                                                   data-action-url="{{ route('order_action', [$order->order_id]) }}"
                                                   data-plan-url="{{ route('order_plan', [$order->order_id]) }}"
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
                            {{ $orderCompleted->links() }}
                        </div>
                        <!-- list section end -->
                    </section>
                </div>
            </div>

            @include('admin_order.show_modal')
            <!-- users list ends -->
        </div>
    </div>
@stop


@section('script')
{{--    <script src="{{ asset('assets/js/order-add.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/order-action.js') }}"></script>--}}
    <script src="{{ asset('assets/js/order-show.js') }}"></script>
{{--    <script src="{{ asset('assets/js/order-reply.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/order-detail.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/order-file.js') }}"></script>--}}
@stop
