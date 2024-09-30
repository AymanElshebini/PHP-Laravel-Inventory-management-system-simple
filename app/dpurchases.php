<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dpurchases extends Model
{
    //

    protected $guarded=[];
    protected $table = 'dpurchases';
    protected  $primaryKey='id';




    public function mpurchases()
    {


        return $this->belongsTo(mpurchases::class);

    }



    public function product()
    {



        return $this->belongsTo(Product::class);


    }


}
