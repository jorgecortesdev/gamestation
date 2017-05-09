@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

    @yield('page_content')

    </div>
    <!-- /page content -->

    <!-- footer content -->
    @include('includes.layouts.footer')
    <!-- /footer content -->
@endsection