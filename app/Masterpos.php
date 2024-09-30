<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masterpos extends Model
{
    //
    protected $guarded=[];
    protected $table = 'Masterpos';
    protected  $primaryKey='id';







    public function  detailspos()
    {
        return $this->hasMany(Masterpos::class,'masterpos_id','id');

    }
}





