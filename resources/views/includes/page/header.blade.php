<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>{!! isset($title_decoration) ? $title_decoration : '' !!}{{ isset($title) ? $title : 'NO TITLE' }}</h3>
            </div>
            @if (isset($search_route))
            <div class="title_right">
                {!! Form::open(['route' => $search_route, 'method' => 'GET']) !!}
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        {!! Form::text('query', Request::get('query'), ['class' => 'form-control', 'placeholder' => 'Buscar...']) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Go!</button>
                        </span>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            @endif
        </div>
    </div>
</div>