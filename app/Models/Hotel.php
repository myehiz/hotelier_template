<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected  $fillable=
        ['name','rating',
            'category','zip_code','address',
            'image','reputation','price','availability',
            'country_id',
            'city_id',
            'state_id'

        ];
}
