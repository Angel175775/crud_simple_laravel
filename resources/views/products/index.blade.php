@extends('layouts.app')
@section('title','Listado de Productos')
@section('content')
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