@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('permissions.index')}}">Permissões</a></li>
  <li class="breadcrumb-item active"><a href="{{ route('permissions.create')}}">Nova</a></li>
</ol>
<h1>Cadastrar Nova Permissão</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('permissions.store')}}" class="from" method="POST">
      @csrf
      @include('admin.pages.permissions._partials.form')      
      
      <div class="form-group">
      <button type="submit" class="btn btn-dark">Enviar</button>
      </div>

    </form>
  </div>
</div>
@stop