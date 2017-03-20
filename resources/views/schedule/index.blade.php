@extends('layouts.blank')

@push('stylesheets')
<link href="{{ asset("css/fullcalendar.min.css") }}" rel="stylesheet">
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-calendar"></i> Agenda</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Agenda GameStation <sup>MX</sup></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                       <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection

@push('scripts')
<script src="{{ asset("js/moment.js") }}"></script>
<script src="{{ asset("js/fullcalendar.min.js") }}"></script>
<script src="{{ asset("js/gscalendar.js") }}"></script>
@endpush