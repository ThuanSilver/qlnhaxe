<?php

namespace App\Imports;


use App\quatang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
class quatangimport implements ToModel
{
    public function model(array $row)
    {
        return new quatang([
            'tenquatang'     => $row[0],



        ]);
    }
}
