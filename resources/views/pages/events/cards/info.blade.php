<div class="card bg-default">
    <div class="card-body">
        <dl>
            <dt>Paquete</dt>
            <dd>{{ strtoupper($event->combo->name) }}</dd>
            <dt>Cliente</dt>
            <dd>{{ $event->client->name }}</dd>
            <dt>Niño</dt>
            <dd>{{ $event->kid->name }}</dd>
            <dt>Creado</dt>
            <dd>{{ $event->created_at }}</dd>
        </dl>
    </div>
</div>