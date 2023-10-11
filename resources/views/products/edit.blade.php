@extends('layouts.app')

@section('title','Edicion del Producto #'.$product->id)

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('products.update',$product->id) }}" method="POST" novalidate>
    @csrf @method('PUT')
<div class="card text-center">
    <div class="card-header">
        <h1> Edición del Producto # {{ $product->id}}</h1>
    </div>

    <div class="mb-3">
     <label for="name" class="form-label">Nombre: </label>
    <input type="text" name="name" value="{{ old('name',$product->name) }}" class="form-control alert-danger">
    </div>
   
    <label for="description" class="form-label">Descripción: </label>
    <div>
        <textarea name="description" cols="60" rows="10"> {{old('description',$product->descripcion) }}</textarea>
    </div>

    <div>
        <label for="unit_price" class="form-label">Precio Unitario:      </label>
        <input type="number" name="unit_price" value="{{old('unit_price',$product->unit_price) }}" class="form-control">
    </div>

    <div>
        <label for="stock" class="form-label">Stock: </label>
        <input type="number" name="stock" value="{{old('stock',$product->stock) }}" class="form-control">
    </div>

    <div>

    </div>

</div>

<div class="card-footer text-muted text-center">
    <button type="submit" class="btn btn-primary">Guardar Producto:</button>
    <a href="{{ route('products.index') }}" class="btn btn-primary">Cancelar</a>
</div>

   
   
</form>
@endsection