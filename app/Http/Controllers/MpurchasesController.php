<?php

namespace App\Http\Controllers;

use App\mpurchases;
use App\Supplier;
use App\unit;
use Illuminate\Http\Request;
use  App\Product;
use  App\Category;
use App\dpurchases;


class MpurchasesController extends Controller
{

    public function index( Request $request)
    {
        $mpurchases = mpurchases::when($request->search, function ($q) use ($request) {

            return $q->where('code', 'like','%' . $request->search . '%');

        })->latest()->paginate(15);

       // $suppliers= Supplier::all();

     //   $mpurchases=mpurchases::all();
        return view('mpurchase.index',compact('mpurchases'));
      //  return view('mpurchase.index');
    }


    public function create(Request $request)
    {
        $max_mpurchases=mpurchases::all()->max('id');// get max number and incrase 1
        $max_mpurchases ++;
        $categories = Category::with('products')->get();
        $suppliers=Supplier::all();




        /*
        $products = Product::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like','%' . $request->search . '%')->orWhere('code', 'like','%' . $request->search . '%')
                ->orWhere('id', 'like','%' . $request->search . '%');

        })
            ->when($request->category_id, function ($q) use ($request) {

                return $q->where('category_id', $request->category_id);

            })->latest()->paginate(30);

     */


        return view('mpurchase.add', compact('categories','max_mpurchases','suppliers'));
        //  return view('mpurchase.index');
    }


    public function store(Request $request)
    {

// dd($request->all());


        $mpurchases = new mpurchases;
        $mpurchases->code=$request->code;
        $mpurchases->date=$request->date;
        $mpurchases->sup_id=$request->sup_id ;
       $mpurchases->inv_total=$request->inv_total;
        $mpurchases->inv_disc=$request->inv_disc;
        $mpurchases->total=$request->total;
        $mpurchases->memo=$request->memo;
        // $mpurchases->save();
       //  dd($mpurchases);
      $mpurchases->save();


      $id=mpurchases::latest()->first()->id;

        if ($id !=0)
        {
            foreach ($request->product_id as $key =>$v)
            {


                dpurchases::create([
                    'mpurchases_id'=>$id,
                    'product_id'=>$request->product_id[$key],
                    'quantity'=>$request->quantity[$key],
                    'prochePrice'=>$request->prochePrice[$key],
                    'discount'=>$request->discount[$key],
                    'totalPrice'=>$request->totalPrice[$key]
                ]);
/*
                $data=array('mpurchases_id'=>$id,
                    'product_id'=>$request->product_id[$key],
                    'unit_id'=>$request->unit_id[$key],
                    'quantity'=>$request->quantity[$key],
                    'prochePrice'=>$request->prochePrice[$key],
                    'discount'=>$request->discount[$key],
                    'totalPrice'=>$request->totalPrice[$key]);


                 dpurchases::insert($data);

       */



            }
        }



   //     $mpurchases->save();





      //  return redirect()->route('admin.orders.index');

/*

        $dpurchases = new dpurchases;
        $mpurchases_id=mpurchases::latest()->first();
        for ($i=0; $i < 10; $i++) {
            dpurchases::create([
             'mpurchases_id'=>$mpurchases_id,
             'product_id'=>$request->product_id,
             'unit_id'=>$request->unit_id,
            'quantity'=>$request->quantity,
            'prochePrice'=>$request->prochePrice,
           'discount'=>$request->discount,
            'totalPrice'=>$request->totalPrice

            ]);
        }
            dd($dpurchases,$mpurchases);
*/

/*

        $dpurchases = new dpurchases;
        $mpurchases_id=mpurchases::latest()->first();
        $dpurchases->product_id=$request->product_id;
        $dpurchases->unit_id=$request->unit_id;
        $dpurchases->quantity=$request->quantity;
        $dpurchases->prochePrice=$request->prochePrice;
        $dpurchases->discount=$request->discount;
        $dpurchases->totalPrice=$request->totalPrice;
        */


       // dd($mpurchases);

       // $mpurchases->save();


     //   dd($request->all());

      //  dd($dpurchases,$mpurchases);







 //   dd($dpurchases,$mpurchases);


/*
            $dpurchases = new dpurchases;
            $mpurchases_id=mpurchases::latest()->first();
            $dpurchases->product_id=$request->product_id;
            $dpurchases->unit_id=$request->unit_id;
            $dpurchases->quantity=$request->quantity;
            $dpurchases->prochePrice=$request->prochePrice;
            $dpurchases->discount=$request->discount;
            $dpurchases->totalPrice=$request->totalPrice;
*/
        //     $dpurchases->save();
     //    dd($dpurchases,$mpurchases);






      //  $dpurchases->save();


        //    dd($dpurchases);
            // $dpurchases->save();








        session()->flash('success', __('siteAr.added_successfully'));

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
