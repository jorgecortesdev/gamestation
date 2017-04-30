<div class="row">
    <div class="col-md-2 col-sm-2 col-xs-12 profile_left">
        <div class="gs-profile-img">
            <img class="img-responsive center-block gs-image" src="{{ $supplier->imagePath() }}">
        </div>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <h3>{{ $supplier->name }}</h3>
        <ul class="list-unstyled user_data">
            <li><i class="fa fa-map-marker fa-fw"></i> {{ $supplier->address }}</li>
            <li><i class="fa fa-phone fa-fw"></i> {{ $supplier->present()->telephone }}</li>
            <li><i class="fa fa-envelope fa-fw"></i> {{ $supplier->present()->email }}</li>
        </ul>
        <ul class="list-inline gs-list-product-types">
            @foreach ($activeProductTypes as $type)
                <li><button class="btn btn-info btn-sm">{{ $type->name }}</button></li>
            @endforeach
        </ul>
    </div>
</div>