@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
<h1>Editar Plano</h1>
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