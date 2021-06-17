@extends('adminlte::page')

@section('title', "Perfis da permissão do Perfil {$permission->name}")

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('profiles.index')}}">Perfis</a></li>
  <li class="breadcrumb-item active"><a href="{{ route('profiles.permissions', $permission->id)}}">Permissões</a></li>
</ol>

<h1>Perfis da permissão - {{$permission->name}} 
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th style="width: 80px;">#</th>
          <th>Nome</th>
          <th style="width: 250px;">Ações</th>
        </tr>
      </thead>

      <tbody>
        @foreach($profiles as $profile)
        <tr>
          <td>
            <input type="checkbox" name="permissions" id="" value="{{$permission}}">
          </td>
          <td>{{$profile->name}}</td>
          <td style="width: 50px;">
            <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    @if(isset($filters))
    {!!$profiles->appends($filters)->links()!!}
    @else
    {!!$profiles->links()!!}
    @endif
  </div>
</div>
@stop