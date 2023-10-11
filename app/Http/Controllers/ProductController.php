<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('products.index',compact('products'));
    }
    
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        //Validacion de los datos
        $validated= $request->validate(
            [
                "name" => "required|string|max:20",
                "description" => "nullable|string|max:255",
                "unit_price"=>"required|numeric|min:0.01",
                "stock"=> "nullable|integer|min:1",
            ]);
       

        //Guardado de los datos
        Product::create($request->all());
        return redirect()->route('products.index')->with('status','Producto creado Satisfactoriamente!');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit',['product'=>$product]);
    }
    public function update(Request $request,$id)
    {
        //Busqueda del Producto
        $product = Product::findOrFail($id);

        //Validacion de los datos
        $validated= $request->validate(
            [   
                "name" => "required|string|max:20",
                "description" => "nullable|string|max:255",
                "unit_price"=>"required|numeric|min:0.01",
                "stock"=> "nullable|integer|min:1",
            ]);
        //Actualizacion del producto
        $product->update($request->all());

        //Redireccion con un mensaje flash de sesión
        return redirect()->route('products.index')->with('status','Producto Actualizado Satisfactoriamente!');
    }

    public function destroy($id)
    {
        //Busqueda del producto
        $product=Product::findOrFail($id);
        //Eliminacion del producto
        $product->delete();
        //Redireccion con un mensaje flash de sesion
        return redirect()->route('products.index')->with('status','Producto Eliminado Satisfactoriamente');
    }

    public function show($id)
    {
        $product=Product::findOrFail($id);
        return view('products.show',['product'=>$product]);
    }
}

