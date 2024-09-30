<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Product;
use App\unit;
use App\Zone;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productImages;
    public function index(Request $request)
    {

        $products=Product::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like','%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('products.products',compact('products'));

    }


    public function create()
    {
        $categories=Category::all();
        $units=unit::all();
        $zones=Zone::all();

        $max_products=Product::all()->max('id');// get max number and incrase 1
        $max_products ++;
        return view('products.add')->with(['categories'=>$categories,
            'units'=>$units,
            'zones'=>$zones,
             'max_products'=>$max_products]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:products,name',
            "imgpath"  => "required"
        ]);

      /*uploades images*/
        $imgpath=$request->	imgpath;
        $imgpath_new_name=time().$imgpath->getClientOriginalName();
        $imgpath->move('uploads/product',$imgpath_new_name);

        /*uploades images*/

          $products=Product::create([
            "code"=> $request->code,
            'category_id'=> $request->category_id,
            'name'=> $request->name,
            'unit_id'=> $request->unit_id,
            'zone_id'=> $request->zone_id ,
            'zone_qty'=> $request->zone_qty,
            'size'=> $request->size,
            'color'=> $request->color,
            'sellprice'=> $request->sellprice,
            'purchaseprice'=> $request->purchaseprice,
            'orderlimit'=> $request->orderlimit,
            'fullDesc'=> $request->fullDesc,
            "imgpath" =>'uploads/product/'.$imgpath_new_name,
           ]);


        session()->flash('success', __('siteAr.added_successfully'));
        return redirect()->route('products.index');

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
           }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
