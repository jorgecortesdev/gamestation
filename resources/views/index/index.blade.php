@extends('layouts.public')

@section('main_container')

<div class="cell">
    <div class="logo">
        <img src="img/logo.jpeg" alt="Game Station Mx">
    </div>
    <nav>
        <a class="btn btn-success" href="{{ route('login') }}">Entrar</a>
    </nav>
</div>


@endsection