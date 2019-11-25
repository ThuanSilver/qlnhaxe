<?php

namespace App\Imports;

use App\khachhang;
use App\tragop;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
class tragopimport implements ToModel
{
    public function model(array $row)
    {
        return new tragop([
            'loaitragop'     => $row[0],
        ]);
    }
}
