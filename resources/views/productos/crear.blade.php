<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo producto') }}
        </h2>
    </x-slot>





                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card p-md-5">
                                    <div class="card-header d-flex justify-content-between align-items-center bg-white m-md-2">
                                        <span>Agregar producto</span>
                                        <a href="/productos" class="btn"><strong>Volver</strong></a>
                                    </div>
                                    <div class="card-body">
                                        @if ( session('mensaje') )
                                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                                        @endif
                                        <form method="POST" action="/productos">
                                            @csrf
                                            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-3" />
                                            <input type="number" step='any' name="precio" placeholder="Precio" class="form-control mb-3" />
                                            <button class="btn btn-secondary btn-sm shadow my-md-1" type="submit">Agregar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





</x-app-layout>