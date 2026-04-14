<?php

namespace App\Exports;

use App\Models\Lending;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LendingExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('lending.export', [
            'lendings' => Lending::with('detailLendings.item', 'user')->withSum('detailLendings as total_qty', 'qty')->get()
        ]);
    }
}
