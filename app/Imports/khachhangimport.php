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
            'name'     => $row[0],
            'ngaysinh'    => $row[1],
            'sdt'    => $row[2],
            'diachi'    => $row[3],
            'phuong'    => $row[4],
            'tinh'    => $row[5],
            'thanhpho'    => $row[6],
        ]);
    }
}
