<!-- Modal -->
<div class="modal fade text-left static" id="add_edit_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Instance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" class="js_add_edit_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Instance: </label>
                            <div class="form-group">
                                <select name="instances[]" class="form-control select2 js_instance" multiple>
                                    @foreach($instances as $instance)
                                        <option value="{{ $instance->id }}">{{ $instance->name_ru }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">status fail!</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Name: </label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control js_name" />
                                <div class="invalid-feedback">name fail!</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Phone: </label>
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control js_phone" placeholder="901004050"/>
                                <div class="invalid-feedback">phone fail!</div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label>Photo: </label>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" id="photo" name="photo" class="custom-file-input js_photo" />
                                    <label for="photo" class="custom-file-label">file</label>
                                    <div class="invalid-feedback">Photo fail!</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Status: </label>
                            <div class="form-group">
                                <select name="status" class="form-control js_status">
                                    <option value="1">Active</option>
                                    <option value="0">No active</option>
                                </select>
                                <div class="invalid-feedback">status fail!</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Login: </label>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control js_username" />
                                <div class="invalid-feedback">Username fail!</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Password: </label>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control js_password" />
                                <div class="invalid-feedback">Password fail!</div>
                            </div>
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

