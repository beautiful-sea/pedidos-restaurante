@extends('boilerplate.page')

@section('header-title')
    <h1>
        Marmitex
        <small>Criar</small>
    </h1>
@stop

@section('header-breadcrumbs')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('marmitas.index') }}">Marmitex</a></li>
    <li class="breadcrumb-item active">Criar</li>
@endsection

@section('content')
    @include('marmitas.form')
@stop