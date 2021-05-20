<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de productos') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="row h-100 mx-0 justify-content-center ">
            <div class="col-md-8 my-auto">
                <div class="card p-md-5">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center pb-md-4 ">
                        <span>Lista de Productos </span>
                        <!-- {{auth()->user()->name}} -->
                        <a href="/productos/create" class="btn btn-secondary btn-sm shadow">Nuevo producto</a>
                    </div>

                    <div class="card-body m-md-2">
                    @if ( session('eliminado') )
                    <div class="alert alert-success">{{ session('eliminado') }}</div>
                    @endif

                    <div class='table-responsive'>
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">#</th> -->
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $item)
                                <tr>
                                    <!-- <th scope="row">{{ $item->id }}</th> -->
                                    <td class="align-middle">{{ $item->nombre }}</td>
                                    <td class="align-middle">{{ $item->precio }}</td>
                                    <td>

                                        <form action="{{route('productos.edit', $item->id)}}" method="POST" class="d-inline">
                                            @method('GET')
                                            @csrf
                                            <button class="btn btn-outline-secondary btn-sm my-1" type="submit">
                                                Editar
                                            </button>
                                        </form>

                                        <form action="{{route('productos.destroy', $item->id)}}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm my-1" type="submit">
                                                Eliminar
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$productos->links()}}
                        {{-- fin card body --}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>