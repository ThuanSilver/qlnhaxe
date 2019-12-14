<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhapxe extends Model
{
    protected $table='nhapxe';
    protected $fillable = [
        'nhacc','ngaynhan','mahd','ngayhd','maID','gianhap','loaixe','tenxe','doixe','mauxe','sokhung',
        'somay','dangkiem','nguoinhan','khonhan'
    ];
    public function kho(){
        return $this->belongsTo('App\kho', 'kho_id','id');

    }
    public function nhanvien(){
        return $this->belongsTo('App\nhanvien', 'nhanvien_id','id');
    }
    public function thongtinxe(){
        return $this->belongsTo('App\thongtinxe', 'thongtinxe_id','id');
    }


}
