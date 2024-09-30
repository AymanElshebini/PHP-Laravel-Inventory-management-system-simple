<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailspos extends Model
{
    //

    protected $guarded=[];
    protected $table = 'Detailspos';
    protected  $primaryKey='id';



    public function  masterpos()
    {


        return $this->belongsTo(Masterpos::class);

    }



    public function product()
    {


        return $this->belongsTo(Product::class);

    }
}
