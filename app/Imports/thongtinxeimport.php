<?php

namespace App\Imports;

use App\khachhang;
use App\thongtinxe;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
class thongtinxeimport implements ToModel
{
    public function model(array $row)
    {
        return new thongtinxe([
            'loaixe'     => $row[0],
            'tenxe'    => $row[1],
            'doixe'    => $row[2],
            'mauxe'    => $row[3],
            'sokhung'    => $row[4],
            'somay'    => $row[5],


        ]);
    }
}
