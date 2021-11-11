<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Http\Requests\InventoryRequest;
use DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Se muestra en una tabla la lista de todas las herramientas que se han agregado, con su información
        $inventories = Inventory::all();
        $workers = Worker::all();
        return view('inventory.index', [
            'inventories' => $inventories,
            'workers' => $workers
        ]);
        /* $inventories = DB::table('inventories')
        ->join('workers', 'workers.id', '=', 'inventories.worker_id')
        ->select('inventories.serial', 'inventories.description', 'workers.name as funcionario')
        ->get();
        return view('inventory.index', [
            'inventories' => $inventories
        ]); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Se muestra la vista del formulario para crear una nueva herramienta
        $workers = Worker::all();
        return view('inventory.create', [
            'workers' => $workers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryRequest $request)
    {
        // Se agrega a la base de datos la información de la nueva herramienta creada, y se valida que todo sea correcto
        $inventory = new Inventory();
        $inventory->serial = $request->get('serial');
        $inventory->brand = $request->get('brand');
        $inventory->model = $request->get('model');
        $inventory->description = $request->get('description');
        $inventory->color = $request->get('color');
        $inventory->status = $request->get('status');
        $inventory->date_assignment = $request->get('date_assignment');
        $inventory->worker_id = $request->get('worker_id');

        $inventory->save();
        return redirect("/inventories");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //Se muestra la vista del formulario para editar una herramienta
        $workers = Worker::all();
        return view('inventory.edit', [
            'inventory' => $inventory,
            'workers' => $workers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        // Validaciones de campos para poder editar
        $request -> validate([
            'serial' => ['required'],
            'brand' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'model' => ['required'],
            'description' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'color' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'status' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'date_assignment' => ['required'],
            'worker_id' => ['required']
        ],
        [
            // Mensajes de error en las validaciones
            'serial.required' => 'El campo Serial es obligatorio',
            'brand.required' => 'El campo Marca es obligatorio',
            'brand.regex' => 'El campo Marca no puede tener números',
            'model.required' => 'El campo Modelo es obligatorio',
            'description.required' => 'El campo Descripción es obligatorio',
            'color.required' => 'El campo Color es obligatorio',
            'status.required' => 'El campo Estado es obligatorio',
            'description.regex' => 'El campo Descripción no puede tener números',
            'color.regex' => 'El campo Color no puede tener números',
            'status.regex' => 'El campo Estado no puede tener números',
            'date_assignment.required' => 'El campo Fecha de Asignación es obligatorio',
            'worker_id.required' => 'Debes seleccionar un funcionario para asignar la herramienta',
            'name.regex' => 'El Nombre no puede tener números'
        ]);

        // Se agrega a la base de datos la información de la herramienta editada, y se valida que todo sea correcto
        $inventory->serial = $request->post('serial');
        $inventory->brand = $request->post('brand');
        $inventory->model = $request->post('model');
        $inventory->description = $request->post('description');
        $inventory->color = $request->post('color');
        $inventory->status = $request->post('status');
        $inventory->date_assignment = $request->post('date_assignment');
        $inventory->worker_id = $request->get('worker_id');

        $inventory->save();
        return redirect("/inventories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker, Inventory $inventory)
    {
        // Se elimina la herramienta seleccionada
        $inventory->delete();
        return back();
    }
}
