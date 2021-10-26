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
        // Se retorna la vista index de los trabajadores (en una tabla con todos los datos)
        return view('worker.index', [
            'workers' => Worker::all()
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
        // Se almacena el trabajador que se ha creado y se retorna a la vista index de trabajadores
        $worker = new Worker();
        $worker -> document = $request->get('document');
        $worker -> name = $request->get('name');
        $worker -> lastname = $request->get('lastname');
        $worker -> telephone = $request->get('telephone');
        $worker -> email = $request->get('email');

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
        //
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
        $request -> validate([
            'document' => ['required', 'min:6', 'max:11']
        ],
        [
            'document.required' => 'El campo Documento es obligatorio',
            'document.min' => 'El campo Documento debe tener al menos 6 dígitos',
            'document.max' => 'El campo Documento debe tener máximo 11 dígitos',
            'document.numeric' => 'El campo Documento debe ser numérico. No puede tener letras o caracteres especiales',
        ]);

        //
        $worker = Worker::find($id);
        // $worker->document = $request->get('document');
        $worker->name = $request->get('name');
        $worker->lastname = $request->get('lastname');
        $worker->telephone = $request->get('telephone');
        $worker->email = $request->get('email');

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
        //
        $worker -> delete();
        return back();
    }
}
