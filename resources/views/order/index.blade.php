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
                    <div class="card-datatable table-responsive">
                        <table class="table" id="datatable">
                            <thead class="thead-light">
                            <tr>
                                <th width="2%">№</th>
                                <th>Author</th>
                                <th>Theme</th>
                                <th>Process</th>
                                <th>Status</th>
                                <th class="text-center" width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders['data'] as $order)
                                <tr class="@if($order['current_stage'] == $order['up_stage']) bg-light-danger @endif">
                                    <td class="control">{{ ++$loop->index }}</td>
                                    <td>
                                        <div class="d-flex justify-content-left align-items-center">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-xl mr-1">
                                                    <img src="{{ asset("assets/images/".$order['user']['photo'])}}"
                                                         alt="Avatar" height="32" width="32">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column"><a href="#" class="user_name text-truncate">
                                                    <span class="font-weight-bold">{{ $order['user']['name'] }}</span></a>
                                                <small class="emp_post text-muted">{{$order['instance']['name_ru']}}</small></div>
                                        </div>
                                    </td>
                                    <td>{{ $order['theme'] }}</td>
                                    <td class="text-center collapse-default">
                                        <div class="card" id="accordionWrapa{{$loop->index}}">
                                            <div id="heading{{$loop->index}}" class="card-header" data-toggle="collapse"
                                                 role="button" data-target="#accordion{{$loop->index}}">
                                                <div class="avatar bg-light-success avatar-lg">
                                                    <span class="avatar-content">{{ $order['current_stage'] }}/{{ $order['stage_count'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($order['status'] == 1) Processing
                                        @elseif($order['status'] == 2) Accepted
                                        @elseif($order['status'] == 3) Go back
                                        @elseif($order['status'] == 4) Declined
                                        @else Completed @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="show-btn js_show_btn"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="p-0 order-comment-div">
                                        <div id="accordion{{$loop->index}}" role="tabpanel"
                                             data-parent="#accordionWrapa{{$loop->index}}"
                                             class="card collapse js_order_collapse">
                                            <div class="card-body">
                                                <div class="order-card bg-light-success">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-xl mr-1">
                                                                <img
                                                                    src="{{ asset("assets/images/avatars/6-small.png")}}"
                                                                    alt="Avatar" height="32" width="32">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column"><a href="#"
                                                                                           class="user_name text-truncate">
                                                                <span
                                                                    class="font-weight-bold">Zsazsa Cleverty</span></a>
                                                            <small class="emp_post text-muted">Finance</small></div>
                                                    </div>
                                                    <div class="comment">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Aliquam asperiores assumenda dolorum eligendi
                                                    </div>
                                                    <i class="fas fa-arrow-right"></i>
                                                </div>
                                                <div class="order-card bg-light-danger">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-xl mr-1">
                                                                <img
                                                                    src="{{ asset("assets/images/avatars/5-small.png")}}"
                                                                    alt="Avatar" height="32" width="32">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column"><a href="#"
                                                                                           class="user_name text-truncate">
                                                                <span
                                                                    class="font-weight-bold">Zsazsa Cleverty</span></a>
                                                            <small class="emp_post text-muted">Finance</small></div>
                                                    </div>
                                                    <div class="comment">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Aliquam asperiores assumenda dolorum eligendi
                                                    </div>
                                                    <i class="fas fa-arrow-right"></i>
                                                </div>
                                                <div class="order-card bg-light-success">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-xl mr-1">
                                                                <img
                                                                    src="{{ asset("assets/images/avatars/4-small.png")}}"
                                                                    alt="Avatar" height="32" width="32">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column"><a href="#"
                                                                                           class="user_name text-truncate">
                                                                <span
                                                                    class="font-weight-bold">Zsazsa Cleverty</span></a>
                                                            <small class="emp_post text-muted">Finance</small></div>
                                                    </div>
                                                    <div class="comment">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Aliquam asperiores assumenda dolorum eligendi
                                                    </div>
                                                    <i class="fas fa-arrow-right"></i>
                                                </div>
                                                <div class="order-card bg-light-success">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-xl mr-1">
                                                                <img
                                                                    src="{{ asset("assets/images/avatars/1-small.png")}}"
                                                                    alt="Avatar" height="32" width="32">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column"><a href="#"
                                                                                           class="user_name text-truncate">
                                                                <span
                                                                    class="font-weight-bold">Zsazsa Cleverty</span></a>
                                                            <small class="emp_post text-muted">Finance</small></div>
                                                    </div>
                                                    <div class="comment">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Aliquam asperiores assumenda dolorum eligendi
                                                    </div>
                                                    <i class="fas fa-arrow-right"></i>
                                                </div>
                                                <div class="order-card bg-light-warning">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-xl mr-1">
                                                                <img
                                                                    src="{{ asset("assets/images/avatars/3-small.png")}}"
                                                                    alt="Avatar" height="32" width="32">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column"><a href="#"
                                                                                           class="user_name text-truncate">
                                                                <span
                                                                    class="font-weight-bold">Zsazsa Cleverty</span></a>
                                                            <small class="emp_post text-muted">Finance</small></div>
                                                    </div>
                                                    <div class="comment">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Aliquam asperiores assumenda dolorum eligendi
                                                    </div>
                                                    <i class="fas fa-arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
{{--                    {{ $orders['links'] }}--}}
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
    <script src="{{ asset('assets/js/scripts/components/components-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/order-add.js') }}"></script>
    <script src="{{ asset('assets/js/order-show.js') }}"></script>
    <script src="{{ asset('assets/js/order-reply.js') }}"></script>
    <script src="{{ asset('assets/js/order-detail.js') }}"></script>
    <script src="{{ asset('assets/js/order-file.js') }}"></script>
@stop
