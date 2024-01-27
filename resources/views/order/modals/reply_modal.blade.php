<!-- Modal -->
<div class="modal fade text-left static" id="order_reply_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__("admin.Order reply")}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('order.action') }}" method="post" class="js_reply_form">
                @csrf
                <input type="hidden" name="order_id" class="js_order_id">
                <input type="hidden" name="status" class="js_status" value="2">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('admin.Answer') }}:</label>
                        <b class="js_text">{{ __('admin.Agreed') }}</b>
                    </div>
                    <div class="form-group">
                        <label for="comment2">{{__("admin.Comment")}}:</label>
                        <textarea class="form-control js_reply_comment" id="comment2" name="comment" rows="2"></textarea>
                        <div class="invalid-feedback">The comment field is required</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__("admin.Save")}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("admin.Close")}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

