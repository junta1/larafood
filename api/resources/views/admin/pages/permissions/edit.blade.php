@extends('adminlte::page')

@section('title', "Editar a Permissão {{$permission->name}}" )

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('permissions.index')}}">Permissões</a></li>
  <li class="breadcrumb-item active"><a href="{{ route('profiles.edit', $permission->id)}}">Editar {{$permission->name}}</a></li>
</ol>
<h1>Editar a Permissão - {{$permission->name}}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('permissions.update', $permission->id)}}" class="from" method="POST">
      @csrf
      @method('PUT')
      @include('admin.pages.permissions._partials.form')      

      <div class="form-group">
        <button type="submit" class="btn btn-dark">Enviar</button>
      </div>

    </form>
  </div>
</div>
@stop