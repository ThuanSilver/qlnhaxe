<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phukien extends Model
{
    protected $table='phukien';
    protected $fillable=[
        'tenphukien','giaban'
    ];

}
