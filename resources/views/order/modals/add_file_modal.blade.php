<!-- Modal -->
<div class="modal fade text-left static" id="add_file_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order reply</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post" class="js_add_file_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="order_id" value="1">
                    <div class="form-group">
                        <label for="">File</label>
                        <div class="custom-file">
                            <label for="file1" class="custom-file-label">{{ __('Прикрепленные файлы') }}</label>
                            <input type="file" id="file1" class="custom-file-input" name="files" />
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

