<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar') }}
        </h2>
    </x-slot>




                    <div class="py-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card p-md-5">
                                    <div class="card-header d-flex justify-content-between align-items-center bg-white m-md-2">
                                        <span>Editar producto</span>
                                        <a href="/productos" class="btn"><strong>Volver</strong></a>
                                    </div>
                                    <div class="card-body m-md-2">
                                        @if ( session('actualizado') )
                                        <div class="alert alert-success">{{ session('actualizado') }}</div>
                                        @endif


                                        <form method="POST" action="{{route('productos.update', $producto->id)}}">
                                            @method('PUT')
                                            @csrf
                                            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-3" value="{{$producto->nombre}}" />
                                            <input type="number" step='any' name="precio" placeholder="Precio" class="form-control mb-3" value="{{$producto->precio}}"/>
                                            <button class="btn btn-secondary btn-sm shadow my-md-1" type="submit">Editar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




</x-app-layout>