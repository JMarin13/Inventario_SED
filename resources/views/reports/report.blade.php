<table>
    <thead>
        <tr>
            <th>Funcionario</th>
            <th>Serial</th>
            <th>Descripción</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Estado</th>
            <th>Fecha Asignación</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($workers as $worker)
            @forelse ($inventories as $inventory)
                @if($inventory->worker_id == $worker->id)
                <tr>
                    <td>{{$worker->name}} {{$worker->lastname}}</td>
                    <td>{{$inventory->serial}}</td>
                    <td>{{$inventory->description}}</td>
                    <td>{{$inventory->model}}</td>
                    <td>{{$inventory->color}}</td>
                    <td>{{$inventory->status}}</td>
                    <td>{{$inventory->date_assignment}}</td>
                </tr>
                @endif
            @empty
                <p>Vacio</p>
            @endforelse
        @empty
            <p>Vacio</p>
        @endforelse
    </tbody>
</table>

{{-- <div class="text-center">
    @forelse($workers as $worker)
        <h2 class="pb-2 mb-2 font-arial alert alert-success border-bottom" style="color: #000">
            {{$worker->name}} {{$worker->lastname}}
        </h2>
        <div class="row mb-2">
            @forelse($inventories as $inventory)
                @if($inventory->worker_id == $worker->id)
                    <div class="col-md-4">
                        <div class="roe no-gutters border rounded overflow-hidden alert alert-success flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static alert alert-success">
                                <h3 class="mb-2">{{$inventory->description}} {{$inventory->brand}}</h3>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <p>El funcionario no tiene herramientas asignadas</p>   
            @endforelse
        </div>
    @empty
        <p>No se ha creado ningún funcionario</p>
    @endforelse
</div> --}}