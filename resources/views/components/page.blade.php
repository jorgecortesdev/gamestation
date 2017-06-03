<div class="page">
    <div class="heading row">
        <div class="col-md-12">
            <div class="title level">
                <h3 class="flex">
                    {{ $heading ?? 'Default heading' }}
                </h3>
                <div class="btn-group">
                    {{ $buttons ?? '' }}
                </div>
            </div>
        </div>
    </div>

    <div class="body row">
        <div class="col-md-12">
            {{ $slot }}
        </div>
    </div>
</div>