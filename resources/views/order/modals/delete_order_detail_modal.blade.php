<!-- Delete Modal -->
<div class="modal fade modal-danger text-left" id="deleteOrderDetailModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="deleteModalMabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalMabel">Danger Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="js_message">
                    Все данные будут удалены безвозвратно.
                    Вы уверены, что хотите это удалить?
                </span>
                <span class="js_danger text-danger"></span>
            </div>
            <div class="modal-footer">
                <form class="js_delete_order_detail_form" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Да</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
            </div>
        </div>
    </div>
</div>
