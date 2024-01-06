<!-- Modal -->
<div class="modal fade text-left static" id="add_order_detail_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('order.store') }}" method="post" class="js_add_order_detail_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Unit</label>
                            <input type="text" name="unit" class="form-control" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Purpose</label>
                            <input type="text" name="purpose" class="form-control" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

