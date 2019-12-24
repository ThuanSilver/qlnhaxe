<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class banphukien extends Model
{
    protected $table='banphukien';
    protected $fillable=[
        'ngayban','somay','tenphukien','soluong','gia','tongtien'
    ];
    public function khophukien(){
        return $this->hasOne('App\khophukien', 'banphukien_id','id');

    }
}
