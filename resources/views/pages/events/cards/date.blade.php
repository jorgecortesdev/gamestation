<div class="card combo-color-bg-{{ $event->combo->google_color_id }} text-color">
    <div class="card-header">{{ $event->present()->dayNameWhenOccurs() }}</div>
    <div class="card-body text-center">
        <h2><i class="fa fa-calendar"></i> {{ $event->present()->monthAndDayWhenOccurs() }}</h2>
    </div>
    <div class="card-footer text-right">{{ $event->present()->yearWhenOccurs() }}</div>
</div>