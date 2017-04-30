@unless($collection)
    <div class="alert alert-danger">NO COLLECTION SET</div>
@else
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
        {{ $collection->links() }}
    </div>
</div>
@endunless