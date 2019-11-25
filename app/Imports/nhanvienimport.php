<?php

namespace App\Imports;

use App\khachhang;
use App\nhanvien;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
class nhanvienimport implements ToModel
{
    public function model(array $row)
    {
        return new nhanvien([
            'nguoinhan'     => $row[0],
            'nguoikt'    => $row[1],
            'nhanvienbh'    => $row[2],


        ]);
    }
}
