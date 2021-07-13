@extends('adminlte::page')

@section('title', "Planos do Perfil {$profile->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('profiles.index')}}">Perfis</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('profiles.plans', $profile->id) }}" class="active">Planos</a></li>
</ol>

<h1>Planos do perfil - <strong>{{ $profile->name }}</strong></h1>
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
                @foreach ($plans as $plan)
                <tr>
                    <td>
                        <input type="checkbox" name="permissions" id="" value="{{$permission}}">
                    </td>
                    <td>{{$plan->name}}</td>
                    <td style="width: 50px;">
                        <a href="{{ route('plans.profile.detach', [$plan->id, $profile->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if(isset($filters))
        {!!$plans->appends($filters)->links()!!}
        @else
        {!!$plans->links()!!}
        @endif
    </div>
</div>
@stop
