<div class="aligner aligner-column card combo-color-bg-{{ $event->combo->color_id }} text-color">
    <div class="aligner-item-start card-header">{{ $event->present()->dayNameWhenOccurs() }}</div>
    <div class="aligner-item aligner card-body text-center">
        <h1><i class="fa fa-calendar"></i> {{ $event->present()->monthAndDayWhenOccurs() }}</h1>
    </div>
    <div class="aligner-item-end card-footer text-right">{{ $event->present()->yearWhenOccurs() }}</div>
</div>