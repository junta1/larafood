@extends('adminlte::page')

@section('title', 'Cadastrar Novo Profile')

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('profiles.index')}}">Profiles</a></li>
  <li class="breadcrumb-item active"><a href="{{ route('profiles.create')}}">Novo</a></li>
</ol>
<h1>Cadastrar Novo Profiles</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('profiles.store')}}" class="from" method="POST">
      @csrf
      @include('admin.pages.profiles._partials.form')      
      
      <div class="form-group">
      <button type="submit" class="btn btn-dark">Enviar</button>
      </div>

    </form>
  </div>
</div>
@stop