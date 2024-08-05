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


    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ url()->previous()}}" class="btn btn-info">Volver</a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-auto " style="width: 600px;">
                <div class="card-body p-6 text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-800">
                    <b>Titulo : {{  $todo->titulo  }}</b><br>
                    <b>Descripcion : {{  $todo->descripcion  }}</b><br>
                    <b>Estado : {{  $todo->estado  }}</b>

                </div>
            </div>
        
        </div>
    </div>
    <div class="card-body">

    </div>
</x-app-layout>