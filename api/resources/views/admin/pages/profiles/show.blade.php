@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('profiles.index')}}">Planos</a></li>
  <li class="breadcrumb-item active"><a href="{{ route('profiles.show', $profile->id)}}">{{$profile->name}}</a></li>
</ol>

<h1>Detalhes do Perfil - <b>{{$profile->name}}</b></h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <ul>
      <li>
        <strong>Nome: </strong> {{$profile->name}}
      </li>
      <li>
        <strong>Descrição: </strong> {{$profile->description}}
      </li>
    </ul>

    @include('admin.includes.alerts')
    
    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"> {{ $profile->name }}</i></button>
    </form>
  </div>
</div>
@stop