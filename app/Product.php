<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded=[];
    protected $table = 'products';
    protected  $primaryKey='id';

    public function category()
    {



        return $this->belongsTo(Category::class);


    }







    public function getimgpathAttribute($imgpath)
    {
        return asset($imgpath);
    }


    public function zone()
    {

        return $this->belongsTo(Zone::class);

    }

    public function  detailspos()
    {

        return $this->hasMany(Detailspos::class,'product_id','id');
    }


    public function  dpurchases()
    {

        return $this->hasMany(dpurchases::class,'product_id','id');
    }








}
