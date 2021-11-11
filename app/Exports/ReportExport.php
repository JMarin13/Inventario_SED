<?php

namespace App\Exports;

use App\Models\Worker;
use App\Models\Inventory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportExport implements FromView
{
    use Exportable;
    private $date;

    public function view(): View
    {
        $workers = Worker::orderBy('name', 'ASC')->get();
        $inventories = Inventory::all();
        return view('reports.report', [
            'workers' => $workers,
            'inventories' => $inventories
        ]);
    }
}
