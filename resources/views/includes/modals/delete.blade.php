<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="deleteModalLabel">Borrar {{ isset($entityText) ? $entityText: 'NOT DEFINED' }}</h4>
            </div>
            <div class="modal-body">
                Estás seguro que deseas borrar este {{ isset($entityText) ? $entityText: 'NOT DEFINED' }}?
            </div>
            <div class="modal-footer">
                {!! Form::open([null, 'method' => 'DELETE', 'role' => 'form']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar', ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var action = button.data('action') // Extract info from data-* attributes

            var modal = $(this)
            modal.find('form').attr('action', action);
        });
    });
</script>
@endpush