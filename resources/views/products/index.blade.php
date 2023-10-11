@extends('layouts.app')

@section('title','Listado de Productos')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif

<a href="{{route('products.create') }}" type="button" class="btn btn-primary btn-lg">Agregar</a>
    @if($products->count())
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio Unitario</th>
            <th>Stock</th>
            <th>Ultima Actualización</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->unit_price}}</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->updated_at}}</td>
            <td>
                {{--Botones de accion ver, editar y eliminar--}}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">Editar</a>
                <form action=" {{ route('products.destroy',$product->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </form>
                    <a href="{{route('products.show',$product->id)}}" type="button" class="btn btn-primary">Ver</a>
                </div>
               
            </td>
        <tr>
    @endforeach
    </tbody>
    
</table>
{{$products->links()}}
@else
<h4>¡No hay Productos Cargados!</h4>
@endif
@endsection