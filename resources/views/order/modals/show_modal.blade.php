<!-- Modal -->
<div class="modal fade text-left static" id="order_show_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title js_title">Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="action-div">
                    <button class="btn btn-outline-success btn-sm js_reply_btn" data-status="2" data-text="Agreed">
                        <i class="avatar-icon" data-feather="check"></i> Reply: Agreed
                    </button>
                    <button type="button" class="btn btn-outline-danger js_reply_btn btn-sm" data-status="3" data-text="Declined (Go Back)">
                        <i class="avatar-icon" data-feather="x"></i> Reply: Declined (Go Back)
                    </button>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="order-detail-div">
                            <div class="d-flex justify-content-between">
                                <p class="title-p">Order detail</p>
                                <button class="btn btn-outline-primary btn-sm js_add_order_detail_btn"><i class="fas fa-plus"></i>&nbsp; Add</button>
                            </div>
                            <table class="table table-sm table-responsive-xl table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Unit</th>
                                    <th>Purpose</th>
                                    <th>Address</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Laptop Hp</td>
                                        <td>4</td>
                                        <td>Pc</td>
                                        <td>for new employees</td>
                                        <td>Hp online shop (alifshop)</td>
                                        <td class="text-right d-flex justify-content-end">
                                            <a class="text-primary mr-1"><i class="fas fa-pen"></i></a>
                                            <a class="text-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td>2</td>
                                    <td>LG monitor</td>
                                    <td>10</td>
                                    <td>Pc</td>
                                    <td>all employees</td>
                                    <td>LG (malika market)</td>
                                    <td class="text-right d-flex justify-content-end">
                                        <a class="text-primary mr-1"><i class="fas fa-pen"></i></a>
                                        <a class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-file-div">
                            <div class="d-flex justify-content-between">
                                <p class="title-p">Order files (Kim qo'shsa o'sha ochira olsin)</p>
                                <button class="btn btn-outline-primary btn-sm js_add_file_btn"><i data-feather='file-plus'></i>&nbsp; add file</button>
                            </div>
                            <table class="table table-sm table-responsive-xl table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">№</th>
                                        <th>Name</th>
                                        <th>File</th>
                                        <th width="10%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>1</td>
                                    <td>Maxmudov Ismoil</td>
                                    <td><a href="{{ asset('assets/images/admin.png') }}" target="_blank">file link</a></td>
                                    <td class="text-center">
                                        <a class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                    <tr>
                                    <td>2</td>
                                    <td>Rakhimov Uchqun</td>
                                    <td><a href="{{ asset('assets/images/avatars/1.png') }}" target="_blank">file link2</a></td>
                                    <td class="text-center">
                                        <a class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="order-action-list mt-1">
                    <p class="title-p">Actions under order</p>
                    <table class="table table-bordered table-sm table-responsive-xl table-striped table-hover nowrap" id="order_passage_logs">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Time</th>
                                    <th>User</th>
                                    <th>Instance</th>
                                    <th>Instance reply</th>
                                    <th style="text-align:center">Instance replied in</th>
                                    <th>Comment</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>31 July 2023 15:57</td>
                                    <td>Isroil Maxmudov</td>
                                    <td>
                                        Intance1
                                    </td>
                                    <td>
                                        Agreed
                                    </td>
                                    <td style="text-align:center">22 h 23 m</td>
                                    <td>ok</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>31 July 2023 15:57</td>
                                    <td>Isroil Maxmudov</td>
                                    <td>
                                        Intance3
                                    </td>
                                    <td>
                                        Agreed
                                    </td>
                                    <td style="text-align:center">00 h 00 m</td>
                                    <td>ok</td>
                                </tr>
                                </tbody>
                            </table>
                </div>

                <div class="order-detail-update">
                    <p class="title-p">Actions under subjects</p>
                    <table class="table table-sm table-responsive-xl table-striped table-bordered table-hover nowrap" id="order_subject_activities">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>№ Subject</th>
                                    <th>Executed</th>
                                    <th>User</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>10 Jul 2023 17:33:30</td>
                                    <td>Isroil Maxmudov</td>
                                    <td>Creator</td>
                                </tr>
                                </tbody>
                            </table>
                </div>

                <div class="progress-plan">
                    <p class="title-p">Passage plan</p>
                    <table class="table table-sm table-responsive-xl table-striped table-bordered table-hover nowrap" id="order_passage_plan">
                        <thead>
                            <tr>
                                <th>Instance</th>
                                <th>Stage</th>
                                <th>Period of consideration</th>
                                <th>Users (in instance)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Intance1
                                </td>
                                <td>1</td>
                                <td>8 working hours</td>
                                <td>
                                    Isroil Maxmudov,
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Intance3
                                </td>
                                <td>2</td>
                                <td>8 working hours</td>
                                <td>
                                    Isroil Maxmudov,
                                    Akmal Xamidov,
                                </td>
                            </tr>
                            <tr>
                            <td>
                                Intance2
                            </td>
                            <td>3</td>
                            <td>8 working hours</td>
                            <td>
                                Isroil Maxmudov,
                                Bakhodir Mirjalilov,
                                Uchkun Rakhimov,
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

