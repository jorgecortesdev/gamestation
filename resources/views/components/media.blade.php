<div class="media">
    <div class="media-left">
        {{ $left ?? '' }}
    </div>

    <div class="media-body">
        {{ $slot }}
    </div>

    <div class="media-right">
        {{ $right ?? '' }}
    </div>
</div>