<x-app-layout>
    <x-slot name="header">
    <div class="d-flex gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Todo') }}
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <x-nav-link :href="route('todo.create')" :active="request()->routeIs('todo.create')">
                            {{ __('Crear Tarea') }}
                </x-nav-link>
            </h2>  
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
 
                @if(Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                        {{  Session::get('alert-success')  }}
                    </div>
                @endif
                @if(Session::has('alert-info'))
                    <div class="alert alert-info" role="alert">
                        {{  Session::get('alert-info')  }}
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{  Session::get('error')  }}
                    </div>
                @endif
               @if(count($todos) >0)
               <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todos as $todo)
                        <tr>
                        <th scope="row">{{ $todo->id }}</th>
                            <td>{{ $todo->titulo }}</td>
                            <td>{{ $todo->descripcion }}</td>
                            <td>{{ $todo->estado }}</td>
                            <td class="d-flex gap-x-2">
                                <a class="btn bt-sm btn-success" href="{{ route('todo.show', $todo->id) }}">Detalles</a>
                                <a class="btn bt-sm btn-secondary" href="{{ route('todo.edit', $todo->id) }}">Editar</a>
                                <!-- <a class="btn bt-sm btn-danger" href="{{ route('todo.destroy', $todo->id) }}">Eliminar</a> -->
                                <form method="post" action="{{ route('todo.destroy') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="todo_id" value="{{  $todo->id  }}">
                                    <input type="submit" value="Delete" name="" id="" class="btn bt-sm btn-danger">
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach

                        
                    </tbody>
                    </table>

               @else
               <h4>No se han creado tareas</h4>
               @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>