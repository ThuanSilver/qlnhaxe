<?php

namespace App\Imports;
use  App\nhapxe;
use App\khachhang;
use App\tragop;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class nhapxeimport implements ShouldAutoSize, ToModel
{
    public function model(array $row)
    {
        return new nhapxe([
            'nhacc'     => $row[0],
            'ngaynhan'  =>$row[1],
            'mahd'     => $row[2],
            'ngayhd'     =>$row[3],
            'maID'     => $row[4],
            'gianhap'     => $row[5],
            'loaixe'     => $row[6],
            'tenxe'     => $row[7],
            'doixe'     => $row[8],
            'mauxe'     => $row[9],
            'sokhung'     => $row[10],
            'somay'     => $row[11],
            'dangkiem'     => $row[12],
            'nguoinhan'     => $row[13],
            'khonhan'     => $row[14],

        ]);
    }
}
