<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Worker;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /* $inventories = Inventory::all();
        $workers = Worker::all();
        return view('inventory.index', [
            'inventories' => $inventory,
            'workers' => $workers
        ]); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Worker $worker)
    {
        //
        return view('inventory.create', [
            'worker' => $worker
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Worker $worker)
    {
        //
        $inventory = new Inventory();
        $inventory->serial = $request->get('serial');
        $inventory->name = $request->get('name');
        $inventory->model = $request->get('model');
        $inventory->date_assignment = $request->get('date_assignment');
        $inventory->worker_id = $worker->id;

        $inventory->save();
        return redirect("/workers/{$worker->id}");
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
    public function edit(Worker $worker, Inventory $inventory)
    {
        //
        return view('inventory.edit', [
            'worker' => $worker,
            'inventory' => $inventory
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker, Inventory $inventory)
    {
        //
        $inventory->delete();
        return back();
    }
}
