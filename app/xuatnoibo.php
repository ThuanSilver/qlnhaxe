<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class xuatnoibo extends Model
{
    protected $table='xuatnoibo';
    protected $fillable = [
         'tinhtrang','ngayxuat','thongtinxe_id','kho_id'
    ];
    public function thongtinxe()
    {
        return $this->belongsTo('App\thongtinxe', 'thongtinxe_id', 'id');
    }
    public function kho()
    {
        return $this->belongsTo('App\kho', 'kho_id', 'id');
    }
}
