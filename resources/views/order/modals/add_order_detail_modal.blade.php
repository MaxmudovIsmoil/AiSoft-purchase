<!-- Modal -->
<div class="modal fade text-left static" id="add_edit_order_detail_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang("admin.Order")</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- action-type -> store = 1 or update = 2 --}}
            <form action="#" method="post" class="js_add_edit_order_detail_form" data-action-type="1">
                @csrf
                <input type="hidden" name="order_id" class="js_order_id" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>@lang("admin.Name") <i class="text-danger">*</i></label>
                            <input type="text" name="name" class="form-control js_name" />
                            <div class="invalid-feedback">The name field is required.</div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>@lang("admin.Count") <i class="text-danger">*</i></label>
                            <input type="number" name="count" class="form-control js_count" />
                            <div class="invalid-feedback">The count field is required.</div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>@lang("admin.Pcs") <i class="text-danger">*</i></label>
                            <input type="text" name="pcs" class="form-control js_pcs" />
                            <div class="invalid-feedback">The pcs field is required.</div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>@lang("admin.Price source") <i class="text-danger">*</i></label>
                            <input type="text" name="price_source" class="form-control js_price_source" />
                            <div class="invalid-feedback">The price source field is required.</div>
                        </div>
                        <div class="col-md-8 form-group">
                            <label>@lang("admin.Address (link)") <i class="text-danger">*</i></label>
                            <input type="text" name="address" class="form-control js_address" />
                            <div class="invalid-feedback">The address field is required.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">@lang("admin.Save")</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang("admin.Close")</button>
                </div>
            </form>
        </div>
    </div>
</div>

