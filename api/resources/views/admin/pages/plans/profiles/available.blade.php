@extends('adminlte::page')

@section('title', "Permissões disponíveis Perfil {$profile->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('profiles.index')}}">Perfis</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.profiles', $plan->id) }}">Perfis</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.profiles.available', $plan->id) }}" class="active">Disponíveis</a></li>
</ol>

<h1>Permissões disponíveis Perfil - <strong>{{ $plan->name }}</strong></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('plans.profiles.available', $plan->id) }}" method="POST" class="form form-inline"> @csrf
            <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ ($filters['filter'] ?? '') }}">
            <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th width="50px">#</th>
                    <th>Nome</th>
                </tr>
            </thead>

            <tbody>
                <form action="{{ route('plans.profiles.attach', $plan->id) }}" method="POST">
                    @csrf

                    @foreach($profiles as $profile)
                    <tr>
                        <td>
                            <input type="checkbox" name="permissions[]" id="" value="{{$profile->id}}">
                        </td>
                        <td>
                            {{$profile->name}}
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="500">
                            @include('admin.includes.alerts')

                            <button type="submit" class="btn btn-success">Vincular</button>
                        </td>
                    </tr>

                </form>
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
