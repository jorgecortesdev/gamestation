<section class="page-header">
    <div class="aligner">
        <h1 class="aligner-item">{{ $heading ?? 'Default heading' }}</h1>

        <div class="btn-group">
            {{ $buttons ?? '' }}
        </div>
    </div>
</section>

<section class="page-body">
    <div class="body row">
        <div class="col-md-12">
            {{ $slot }}
        </div>
    </div>
</section>