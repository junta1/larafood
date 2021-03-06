@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('plans.index')}}">Planos</a></li>
  <li class="breadcrumb-item active"><a href="{{ route('plans.create')}}">Novo</a></li>
</ol>
<h1>Cadastrar Novo Plano</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('plans.store')}}" class="from" method="POST">
      @csrf
      @include('admin.pages.plans._partials.form')      
      
      <div class="form-group">
      <button type="submit" class="btn btn-dark">Enviar</button>
      </div>

    </form>
  </div>
</div>
@stop