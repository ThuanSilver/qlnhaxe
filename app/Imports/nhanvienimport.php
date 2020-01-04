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
            'name'     => $row[0],
            'chucvu'    => $row[1],



        ]);
    }
}
