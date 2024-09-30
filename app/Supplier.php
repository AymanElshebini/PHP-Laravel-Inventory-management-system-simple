<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{


    protected $guarded=[];
    protected $table = 'suppliers';
    protected  $primaryKey='id';



    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
