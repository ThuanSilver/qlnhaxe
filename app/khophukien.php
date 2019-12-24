<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khophukien extends Model
{
    protected $table='khophukien';
    protected $fillable=[
        'tenkho','dia_diem','soluongton','nhap','ngaynhap','conlai','banphukien_id'
    ];
    public function banphukien(){
        return $this->belongsTo('App\banphukien', 'banphukien_id','id');

    }
}
