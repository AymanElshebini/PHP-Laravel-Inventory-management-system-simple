<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded=[];
    protected $table = 'categories';
    protected  $primaryKey='id';

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');

    }
    public function getimgpathAttribute($imgpath)
    {
        return asset($imgpath);
    }
}
