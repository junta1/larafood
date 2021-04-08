@extends('adminlte::page')

@section('title', "Editar o Perfil {{$profile->name}}" )

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('profiles.index')}}">Profiles</a></li>
  <li class="breadcrumb-item active"><a href="{{ route('profiles.edit', $profile->id)}}">Editar {{$profile->name}}</a></li>
</ol>
<h1>Editar o Perfil - {{$profile->name}}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('profiles.update', $profile->id)}}" class="from" method="POST">
      @csrf
      @method('PUT')
      @include('admin.pages.profiles._partials.form')      

      <div class="form-group">
        <button type="submit" class="btn btn-dark">Enviar</button>
      </div>

    </form>
  </div>
</div>
@stop