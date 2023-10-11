@extends('layouts.app')
@section('title','Datos del Producto')

@section('content')
<h1> Ver producto #{{ $product->id }} </h1>
<ul class="list-group">
    <li class="list-group-item">ID: {{ $product->id }} </li>
    <li class="list-group-item">Name: {{$product->name}}</li>
    <li class="list-group-item">Descripción: {{$product->description}}</li>
    <li class="list-group-item">Stock: {{$product->stock}}</li>
    <li class="list-group-item">Ultima Actualización: {{$product->updated_at}}</li>
  </ul>
  <a href="{{route('products.index') }}" class="btn btn-primary">Regresar</a>

@endsection