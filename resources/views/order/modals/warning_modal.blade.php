<div class="modal fade text-left modal-warning" id="warning" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel140">{{__("admin.User plan")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{__("admin.Please before creating an order make a plan for yourself.")}}
            </div>
            <div class="modal-footer">
                <a href="{{ route('user-plan.index') }}" class="btn btn-warning">{{__("admin.Create now")}}</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("admin.Accept")}}</button>
            </div>
        </div>
    </div>
</div>
