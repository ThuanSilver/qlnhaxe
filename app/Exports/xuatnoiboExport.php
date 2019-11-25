<?php

namespace App\Exports;
use Maatwebsite\Excel;
use App\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\xuatnoibo;


class xuatnoiboExport implements FromView
{
    /**[
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('xuatnoibo.index', [
            'xuatnoibos' => xuatnoibo::all()

        ]);
    }
}
