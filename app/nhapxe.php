<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhapxe extends Model
{
    protected $table='nhapxe';
    protected $fillable = [
        'somay','sokhung' ,'nhacc','ngaynhan','mahd','ngayhd','maID','gianhap','kho_id','nhanvien_id','thongtinxe_id'
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
