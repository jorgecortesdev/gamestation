<div class="modal fade" id="propertyModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open([null, 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
                </button>
                <h4 class="modal-title">Introduce el valor solicitado:</h4>
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

    function renderEventProperty(event_id, property_id) {

        var source   = $('#property-template').html();
        var template = Handlebars.compile(source);

        var container    = $('.modal-body');
        container.empty();

        $.ajax({
            url: '/api/v1/event/' + event_id + '/property/' + property_id,
            type: 'GET',
            success: function(data) {
                container.append(template(data));
                container.find('input.flat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            }
        });
    }

    $(document).ready(function() {
        $('#propertyModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var action = button.data('action'); // Extract info from data-* attributes

            var property_id = button.data('property-id');
            var event_id = button.data('event-id');

            renderEventProperty(event_id, property_id);

            var modal = $(this)
            modal.find('form').attr('action', action);
        });
    });

</script>
@endpush