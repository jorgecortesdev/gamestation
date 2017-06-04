<div class="modal fade" id="configureModal" tabindex="-1" role="dialog" aria-labelledby="configureModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open([null, 'method' => 'PATCH', 'role' => 'form']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="deleteModalLabel">Selecciona el producto deseado</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                {!! Form::button('<i class="fa fa-floppy-o"></i> Guardar', ['class' => 'btn btn-sm btn-primary', 'type' => 'submit']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@push('scripts')
<script type="text/javascript">

    function getOptions(configuration_id) {

        var source   = $('#configurable-template').html();
        var template = Handlebars.compile(source);

        var container    = $('.modal-body');
        container.empty();

        $.ajax({
            url: '/api/v1/configurations/' + configuration_id,
            type: 'GET',
            success: function(data) {
                container.append(template(data));
            }
        });
    }

    $(document).ready(function() {
        $('#configureModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var action = button.data('action'); // Extract info from data-* attributes

            var id = button.data('id');
            getOptions(id);

            var modal = $(this)
            modal.find('form').attr('action', action);
        });
    });

</script>
@endpush