<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\khachhang;
use Maatwebsite\Excel\Concerns\ToModel;
class khachhangimport implements ToModel
{

    public function model(array $row)
    {
        return new khachhang([
            'hovaten'     => $row[0],
            'ngaysinh'    => $row[1],
            'sdt'    => $row[2],
            'diachi'    => $row[3],


        ]);
    }
}
