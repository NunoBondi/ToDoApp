
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-auto " style="width: 600px;">
                <div class="card-body p-6 text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-800">
           
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                    <form method="post" action="{{ route('todo.update') }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="todo_id" id="" value="{{ $todo->id}}">
                        <div class="mb-3">
                            <label class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="titulo" value="{{$todo->titulo}}">
                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="descripcion">Descripcion</label>
                            <textarea name="descripcion" cols="5" rows="5" class="form-control"  >{{$todo->descripcion}}</textarea>
                            
                        </div>
                        <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select" name="estado" aria-label="Selecciona el estado" value="{{$todo->estado}}">
                                    <option value="" disabled selected>Actual: {{$todo->estado}}</option>
                                    <option value="Sin Iniciar">Sin iniciar</option>
                                    <option value="En Progreso">En progreso</option>
                                    <option value="Completado">Finalizado</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        
        </div>
    </div>
</x-app-layout>
