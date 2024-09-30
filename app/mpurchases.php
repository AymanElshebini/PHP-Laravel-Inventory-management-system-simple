<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mpurchases extends Model
{
    //

    protected $guarded=[];
    protected $table = 'mpurchases';
    protected  $primaryKey='id';


    public function dpurchases()
    {
        return $this->hasMany(mpurchases::class,'mpurchases_id','id');

    }






}



