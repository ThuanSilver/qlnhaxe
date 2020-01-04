<?php

namespace App\Imports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use  App\kho;
use Maatwebsite\Excel\Concerns\ToModel;
class khoimport implements ToModel
{
    public function model(array $row)
    {
        return new kho([
            'dia_diem'     => $row[0],
            'name'    => $row[1],
        ]);
    }
}
