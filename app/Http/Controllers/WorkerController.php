<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use App\Http\Requests\WorkerRequest;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Se retorna la vista principal de los trabajadores (en una tabla con todos los datos)
        return view('worker.index', [
            'workers' => Worker::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Se redirige al formulario para crear un nuevo trabajador
        return view('worker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkerRequest $request)
    {
        // Se almacena el trabajador que se ha creado y se retorna a la vista principal de trabajadores
        $worker = new Worker();
        $worker -> document = $request->get('document');
        $worker -> name = $request->get('name');
        $worker -> lastname = $request->get('lastname');
        $worker -> telephone = $request->get('telephone');
        $worker -> email = $request->get('email');
        $worker -> dependency = $request->get('dependency');
        $worker -> profession = $request->get('profession');

        $worker -> save();
        return redirect('/workers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        // Se redirecciona a la vista del inventario de cada trabajador por medio del ModelBinding (No está en uso)
        return view('worker.show', [
            'worker' => $worker
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Se redirige al formulario para editar un nuevo trabajador
        $worker = Worker::find($id);
        return view('worker.edit', [
            'worker' => $worker
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validaciones de campos para poder editar el trabajador
        $request -> validate([
            'document' => ['required', 'min:6', 'max:11'],
            'name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:2'],
            'lastname' => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:2'],
            'telephone' => ['required', 'min:7', 'max:10'],
            'email' => ['required', 'email'],
            'profession' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'dependency' => ['required', 'regex:/^[\pL\s\-]+$/u']
        ],
        [
            // Mensajes de error en las validaciones
            'document.required' => 'El campo Documento es obligatorio',
            'name.required' => 'El campo Nombres es obligatorio',
            'lastname.required' => 'El campo Apellidos es obligatorio',
            'telephone.required' => 'El campo Celular es obligatorio',
            'email.required' => 'El campo Correo Electrónico es obligatorio',
            'document.min' => 'El campo Documento debe tener al menos 6 dígitos',
            'name.min' => 'El campo Nombres debe tener al menos 2 letras',
            'lastname.min' => 'El campo Apellidos debe tener al menos 2 letras',
            'telephone.min' => 'El campo Celular debe tener al menos 7 dígitos',
            'document.max' => 'El campo Documento debe tener máximo 11 dígitos',
            'telephone.max' => 'El campo Celular debe tener máximo 10 dígitos',
            'email.email' => 'Diligencie un correo electrónico válido',
            'name.regex' => 'El Nombre no puede tener números',
            'lastname.regex' => 'El Apellido no puede tener números',
            'profession.required' => 'El campo Cargo es obligatorio',
            'profession.regex' => 'El campo Cargo no puede tener números',
            'dependency.required' => 'El campo Dependencia es obligatorio',
            'dependency.regex' => 'El campo Dependencia no puede tener números'
        ]);

        //Se almacena el trabajador que se ha editado y se retorna a la vista principal de trabajadores
        $worker = Worker::find($id);
        $worker->name = $request->get('name');
        $worker->lastname = $request->get('lastname');
        $worker->telephone = $request->get('telephone');
        $worker->email = $request->get('email');
        $worker->dependency = $request->get('dependency');
        $worker->profession = $request->get('profession');

        $worker -> save();
        return redirect('/workers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        // Se elimina el trabajador seleccionado
        $worker -> delete();
        return back();
    }
}
