@extends('adminlte::page')

@section('title', "Editar Plano {{$plan->name}}")

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('plans.index')}}">Planos</a></li>
  <li class="breadcrumb-item active"><a href="{{ route('plans.edit', $plan->url)}}">Novo</a></li>
</ol>
<h1>Editar Plano {{$plan->name}}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('plans.update', $plan->url)}}" class="from" method="POST">
      @csrf
      @method('PUT')
      @include('admin.pages.plans._partials.form')      

      <div class="form-group">
        <button type="submit" class="btn btn-dark">Enviar</button>
      </div>

    </form>
  </div>
</div>
@stop