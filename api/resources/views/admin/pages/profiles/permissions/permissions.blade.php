@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('profiles.index')}}">Perfis</a></li>
  <li class="breadcrumb-item active"><a href="{{ route('profiles.permissions', $profile->id)}}">Permissões</a></li>
</ol>

<h1>Permissões do Perfil - {{$profile->name}} 
  <a href="{{route('profiles.permissions.available', $profile->id)}}" class="btn btn-dark">ADD NOVA PERMISSÃO</a></h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
    <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
      @csrf
      <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ ($filters['filter'] ?? '') }}">
      <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
    </form>
  </div>

  <div class="card-body">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th style="width: 250px;">Ações</th>
        </tr>
      </thead>

      <tbody>
        @foreach($permissions as $permission)
        <tr>
          <td>
            <input type="checkbox" name="permissions" id="" value="{{$permission}}">
          </td>
          <td>{{$permission->name}}</td>
          <td style="width: 50px;">
            <a href="{{ route('profiles.edit', $permission->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    @if(isset($filters))
    {!!$permissions->appends($filters)->links()!!}
    @else
    {!!$permissions->links()!!}
    @endif
  </div>
</div>
@stop