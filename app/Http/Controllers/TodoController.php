<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todo.index', [ 'todos' => $todos]); 
        
;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        // $request->validate();
        // Todo::Create($request->all());
        Todo::create([
        'titulo' => $request->titulo,
        'descripcion' =>$request->descripcion,
        'estado' => $request->estado
        
        ]);

        $request->session()->flash('alert-success', 'Tarea agregada correctamente.' );

        return to_route('todo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        if(!$todo){
            request()->session()->flash('error', 'No se encontró esa tarea' );
            return to_route('todo.index')->withErrors([
                'error' => 'No se encontró esa tarea'
            ]);
        }
        return view('todo.show', ['todo' =>$todo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        if(!$todo){
            request()->session()->flash('error', 'No se encontró esa tarea' );
            return to_route('todo.index')->withErrors([
                'error' => 'No se encontró esa tarea'
            ]);
        }
        return view('todo.edit', ['todo' =>$todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request)
    {
        $todo = Todo::find($request->todo_id);
        if(!$todo){
            request()->session()->flash('error', 'No se encontró esa tarea' );
            return to_route('todo.index')->withErrors([
                'error' => 'No se encontró esa tarea'
            ]);
        }

        $todo->update([
            'titulo' =>$request->titulo,
            'descripcion' =>$request->descripcion,
            'estado' =>$request->estado,
        ]);
        request()->session()->flash('alert-info', 'Tarea Actualizada correctamente' );
        return to_route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $todo = Todo::find($request->todo_id);
        if(!$todo){
            request()->session()->flash('error', 'No se encontró esa tarea' );
            return to_route('todo.index')->withErrors([
                'error' => 'No se encontró esa tarea'
            ]);
        }
        $todo->delete();
        request()->session()->flash('alert-info', 'Se ha eliminado correctamente' );
        return to_route('todo.index');
    }
}
