<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  App\Customer;
use App\Supplier;

class City extends Model
{



    protected $guarded=[];
    protected $table = 'cities';
    protected  $primaryKey='id';



    public function Customer()
    {
        return $this->hasMany(Customer::class,'city_id');
    }


    public function Supplier()
    {
        return $this->hasMany(Supplier::class,'city_id');
    }



}
