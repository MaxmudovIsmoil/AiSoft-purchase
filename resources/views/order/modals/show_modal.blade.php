<!-- Modal -->
<div class="modal fade text-left static" id="order_show_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title js_title">{{("admin.Order")}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="action-div d-none">
                    <button class="btn btn-outline-success btn-sm js_reply_btn" data-status="2" data-text="Agreed">
                        <i class="avatar-icon" data-feather="check"></i> {{("admin.Reply: Agreed")}}
                    </button>
                    <button type="button" class="btn btn-outline-danger js_reply_btn btn-sm" data-status="3" data-text="Declined (Go Back)">
                        <i class="avatar-icon" data-feather="x"></i> {{("admin.Reply: Declined")}}
                    </button>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="order-detail-div">
                            <div class="d-flex justify-content-between">
                                <p class="title-p">{{("admin.Order detail")}}</p>
                                <button class="btn btn-outline-primary btn-sm js_add_order_detail_btn d-none"
                                data-url="{{ route('order_detail.store') }}"
                                ><i class="fas fa-plus"></i>&nbsp; Add</button>
                            </div>
                            <table class="table table-sm table-responsive-xl table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>{{("admin.Name")}}</th>
                                        <th>{{("admin.Count")}}</th>
                                        <th>{{("admin.Unit")}}</th>
                                        <th>{{("admin.Price source")}}</th>
                                        <th>{{("admin.Address")}}</th>
                                        <th class="text-right js_detail_table_th d-none">{{("admin.Action")}}</th>
                                    </tr>
                                </thead>
                                <tbody class="js_order_detail_tbody"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-file-div">
                            <div class="d-flex justify-content-between">
                                <p class="title-p">{{("admin.Order files")}}</p>
                                <button
                                    class="btn btn-outline-primary btn-sm js_add_order_file_btn"
                                    data-url="{{ route('order_file.store') }}">
                                    <i data-feather='file-plus'></i>&nbsp; {{("admin.add file")}}
                                </button>
                            </div>
                            <table class="table table-sm table-responsive-xl table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">№</th>
                                        <th>{{("admin.Name")}}</th>
                                        <th>{{("admin.File")}}</th>
                                        <th width="10%" class="text-center">{{("admin.Action")}}</th>
                                    </tr>
                                </thead>
                                <tbody class="js_order_file_tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="order-action-list mt-1">
                    <p class="title-p">{{("admin.Actions under order")}}</p>
                    <table class="table table-bordered table-sm table-responsive-xl table-striped table-hover nowrap" id="order_passage_logs">
                        <thead>
                                <tr>
                                    <th>№</th>
                                    <th>{{("admin.Time")}}</th>
                                    <th>{{("admin.User")}}</th>
                                    <th>{{("admin.Instance")}}</th>
                                    <th>{{("admin.Instance reply")}}</th>
{{--                                    <th style="text-align:center">Instance replied in</th>--}}
                                    <th>{{("admin.Comment")}}</th>
                                </tr>
                                </thead>
                                <tbody class="js_order_action_tbody"></tbody>
                    </table>
                </div>

{{--                <div class="order-detail-update">--}}
{{--                    <p class="title-p">Actions under subjects</p>--}}
{{--                    <table class="table table-sm table-responsive-xl table-striped table-bordered table-hover nowrap" id="order_subject_activities">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>№</th>--}}
{{--                                    <th>№ Subject</th>--}}
{{--                                    <th>Executed</th>--}}
{{--                                    <th>User</th>--}}
{{--                                    <th>Description</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td></td>--}}
{{--                                    <td></td>--}}
{{--                                    <td>10 Jul 2023 17:33:30</td>--}}
{{--                                    <td>Isroil Maxmudov</td>--}}
{{--                                    <td>Creator</td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                </div>--}}

                <div class="progress-plan">
                    <p class="title-p">{{("admin.Passage plan")}}</p>
                    <table class="table table-sm table-responsive-xl table-striped table-bordered table-hover nowrap" id="order_passage_plan">
                        <thead>
                            <tr>
                                <th>{{("admin.Instance")}}</th>
                                <th>{{("admin.Stage")}}</th>
                                <th>{{("admin.Users (in instance)")}}</th>
                            </tr>
                        </thead>
                        <tbody class="js_order_plan_tbody"></tbody>
                    </table>
                </div>
            </div>
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--            </div>--}}
        </div>
    </div>
</div>

