<!-- Modal -->
<div class="modal fade text-left static" id="order_show_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title js_title">{{__("admin.Order")}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-8">
                        <div class="order-detail-div">
                            <div class="d-flex justify-content-between">
                                <p class="title-p">{{__("admin.Order detail")}}</p>
                            </div>
                            <table class="table table-sm table-responsive-xl table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>{{__("admin.Name")}}</th>
                                        <th>{{__("admin.Count")}}</th>
                                        <th>{{__("admin.Unit")}}</th>
                                        <th>{{__("admin.Price source")}}</th>
                                        <th>{{__("admin.Address")}}</th>
                                        <th class="text-right js_detail_table_th d-none">{{__("admin.Action")}}</th>
                                    </tr>
                                </thead>
                                <tbody class="js_order_detail_tbody"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-file-div">
                            <div class="d-flex justify-content-between">
                                <p class="title-p">{{__("admin.Order files")}}</p>
                            </div>
                            <table class="table table-sm table-responsive-xl table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">№</th>
                                        <th>{{__("admin.Name")}}</th>
                                        <th>{{__("admin.File")}}</th>
                                        <th width="10%" class="text-center">{{__("admin.Action")}}</th>
                                    </tr>
                                </thead>
                                <tbody class="js_order_file_tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="order-action-list mt-1">
                    <p class="title-p">{{__("admin.Actions under order")}}</p>
                    <table class="table table-bordered table-sm table-responsive-xl table-striped table-hover nowrap" id="order_passage_logs">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>{{__("admin.Time")}}</th>
                                <th>{{__("admin.User")}}</th>
                                <th>{{__("admin.Instance")}}</th>
                                <th>{{__("admin.Instance reply")}}</th>
                                <th>{{__("admin.Comment")}}</th>
                            </tr>
                        </thead>
                        <tbody class="js_order_action_tbody"></tbody>
                    </table>
                </div>

                <div class="progress-plan">
                    <p class="title-p">{{__("admin.Passage plan")}}</p>
                    <table class="table table-sm table-responsive-xl table-striped table-bordered table-hover nowrap" id="order_passage_plan">
                        <thead>
                            <tr>
                                <th>{{__("admin.Instance")}}</th>
                                <th>{{__("admin.Stage")}}</th>
                                <th>{{__("admin.Users (in instance)")}}</th>
                            </tr>
                        </thead>
                        <tbody class="js_order_plan_tbody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

