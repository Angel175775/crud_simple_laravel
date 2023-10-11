@extends('layouts.app')
@section('title','Crear un nuevo Producto')

@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
  </div>
@endif

<form action="{{route('products.store') }}" method="POST" novalidate>
    @csrf

<div class="card text-center">
  <div class="card-header">
    <h1>Crear un nuevo Producto</h1>
  </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nombre: </label>
        <input type="text" name="name" value="{{old('name') }}" class="form-control alert-danger">
      </div>

      <label for="description" class="form-label">Descripción: </label>
      <div class="mb-3">
        <textarea name="description" cols="60" rows="10">{{ old('description') }}</textarea>
      </div>

      <div class="mb-3">
        <label for="unit_price" class="form-label">Precio Unitario: </label>
        <input type="number" name="unit_price" value="{{ old('unit_price') }}" class="form-control">
      </div>
      
      <div>
        <label for="stock" class="form-label">Stock: </label>
        <input type="number" name="stock" value="{{ old('stock') }}" class="form-control">
      </div>

 

</div>

  <div class="card-footer text-muted text-center">
    <button type="submit" class="btn btn-primary">Guardar Producto</button>
    <a href="{{ route('products.index') }}" class="btn btn-primary">Cancelar</a>
  </div>

</form>
@endsection