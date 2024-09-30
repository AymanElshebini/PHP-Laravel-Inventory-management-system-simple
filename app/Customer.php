<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;



class Customer extends Model
{

    protected $guarded=[];
    protected $table = 'customers';
    protected  $primaryKey='id';



    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function Masterpos()
    {
        return $this->hasMany(Masterpos::class,'custid');
    }

}
