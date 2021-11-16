<table>
    <thead>
        <tr>
            <th>Funcionario</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Descripción</th>
            <th>Serial</th>
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
                    <td>{{$inventory->brand}}</td>
                    <td>{{$inventory->model}}</td>
                    <td>{{$inventory->description}}</td>
                    <td>{{$inventory->serial}}</td>
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