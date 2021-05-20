<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioId = auth()->user()->id; // auth()->user() contiene la info del usuario (puedes verla haciendo un return), puedes añadir id, email, nombre

        //El where es clave, es lo que nos permite que guarde solo los productos del usuario con este id
        //Si queremos una lista que compartan todos los usuarios, tendríamos que hacerlo de otra manera

        //ASÍ SERÍA PARA MOSTRAR SOLO LOS PRODUCTOS DE CADA USUARIO (A PARTIR DE SU ID)
        //usuarioid es el campo que creaste en la tabla para identificar cada producto con el usuario
       // $productos = Producto::where('usuarioid', $usuarioId)->paginate(5); 

        $productos = Producto::paginate(5);


        return view('productos.lista', compact('productos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Este es el que gestiona el crear un nuevo producto

        $producto = new Producto();
        $producto->nombre = $request->nombre; 
        $producto->precio = $request->precio; 
        $producto->usuarioid = auth()->user()->id;  // Para acceder a la info del user
        $producto->save();

        return back()->with('mensaje', 'Producto agregado');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //encontrar el producto
        $producto = Producto::findOrFail($id);


        //ir a la vista del formulario, con la info del producto
        return view('productos.editar', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //recibir la info de la vista
        $productoUpdate = Producto::findOrFail($id);
 

        //modificar el registro producto y guardarlo
        $productoUpdate->nombre = $request->nombre;
        $productoUpdate->precio = $request->precio;
        $productoUpdate->usuarioid = auth()->user()->id;

        $productoUpdate->save();

        //volver a la vista de la lista
        return back()->with('actualizado', 'Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productoEliminar = Producto::findOrFail($id);
        $productoEliminar->delete();
        
        return back()->with('eliminado', 'Producto eliminado');
    }
}
