<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thungoai extends Model
{
    protected $table='thungoai';
    protected $fillable=[
     'ngaythu','loaithu','tienthu','ghichu'
];
}
