<!-- Modal -->
<div class="modal fade text-left static" id="order_add_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('order.store') }}" method="post" class="js_add_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Instance: </label>
                            <div class="form-group">
                                <select name="instance_id" class="form-control js_instance">
                                    @foreach($user_plans as $user_plan)
                                        <option value="{{ $user_plan->instance_id }}">{{ $user_plan->instance->name_ru }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">instance fail!</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">File:</label>
                            <div class="custom-file">
                                <label for="file" class="custom-file-label">{{ __('Прикрепленные файлы') }}</label>
                                <input type="file" id="file" class="custom-file-input" name="files[]" multiple />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="theme">Theme:</label>
                                <textarea class="form-control js_theme" name="theme" id="theme" rows="2"></textarea>
                                <div class="invalid-feedback">name fail!</div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-sm btn-primary js_add_tr_btn mr-1"><i class="fas fa-plus"></i> Add</button>
                                <button class="btn btn-sm btn-danger js_remove_tr_btn"><i class="fas fa-minus"></i> Remove</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="order-add-table table rounded table-striped table-bordered table-hover">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>№</th>
                                        <th>Name</th>
                                        <th>Count</th>
                                        <th>Pcs</th>
                                        <th>Price source</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody class="js_tbody">
                                    <tr>
                                        <td>1</td>
                                        <td><input type="text" name="name[]" class="form-control js_od_name"/></td>
                                        <td><input type="number" name="count[]" class="form-control js_od_pcs"/></td>
                                        <td><input type="text" name="pcs[]" class="form-control"/></td>
                                        <td><input type="text" name="price_source[]" class="form-control"/></td>
                                        <td><input type="text" name="address[]" class="form-control"/></td>
                                    </tr>
                                </tbody>
                            </table>
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

