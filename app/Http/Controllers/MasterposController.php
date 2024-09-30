<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Detailspos;
use App\Masterpos;
use App\Orderstat;
use App\orderstats;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class MasterposController extends Controller
{

    public function index(Request $request)
    {



        $masterpos=Masterpos::when($request->search, function ($q) use ($request) {

            return $q->where('code', 'like','%' . $request->search . '%');

        })->latest()->paginate(15);

        return view('masterpos.index',compact('masterpos'));

      }


    public function create(Request $request)
    {
       $max_mosterpos=Masterpos::all()->max('id');// get max number and incrase 1
        $max_mosterpos ++;
       // $categories = Category::with('products')->get();
       // $products=Product::all();
       // $suppliers=Supplier::all();
        $customers=Customer::all();

        $categories =Category::all();




        $products = Product::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like','%' . $request->search . '%')->orWhere('code', 'like','%' . $request->search . '%')
                ->orWhere('id', 'like','%' . $request->search . '%');

        })
            ->when($request->category_id, function ($q) use ($request) {

                return $q->where('category_id', $request->category_id);

            })->latest()->paginate(30);


        return view('masterpos.add', compact('categories','products','max_mosterpos','customers'));

    }


    public function store(Request $request)
    {
        //  dd($mpurchases);
      //   dd($request->all());
        $masterpos= new Masterpos;
        $masterpos->code=$request->code;
        $masterpos->date=$request->date;
        $masterpos->cust_id=$request->cust_id ;
        $masterpos->orderstatsid=$request->orderstatsid ;
        $masterpos->inv_total=$request->inv_total;
        $masterpos->shiping_cost=$request->shiping_cost	;
        $masterpos->inv_disc=$request->inv_disc;
        $masterpos->total=$request->total;
        $masterpos->memo=$request->memo;
        $masterpos->save();

        $id=Masterpos::latest()->first()->id;
         if ($id !=0)
        {
            foreach ($request->product_id as $key =>$v)
            {
                   Detailspos::create([
                    'masterpos_id'=>$id,
                    'product_id'=>$request->product_id[$key],
                    'quantity'=>$request->quantity[$key],
                    'sellPrice'=>$request->sellPrice[$key],
                    'discount'=>$request->discount[$key],
                    'totalPrice'=>$request->totalPrice[$key]
                ]);


            }
        }

        session()->flash('success', __('siteAr.added_successfully'));
    }


    public function show($id)
    {

        $Masterpos=Masterpos::find($id);


        $detailspos=Detailspos::select('id','product_id','masterpos_id')->where('masterpos_id',$id)->get();

        return view('masterpos.showDetails',compact('Masterpos','detailspos'));

        /*
        return DB::table('Masterpos')->
            join('detailspos','detailspos.masterpos_id','masterpos.id')->get();
*/

    }


    public function edit($id)
    {

        $products=Product::all();
        $masterpos=Masterpos::find($id);
        $customers=Customer::all();
        $orderstats=orderstats::all();
        $categories =Category::all();

        $detailspos=Detailspos::select('id','product_id','masterpos_id','quantity','sellPrice','discount','totalPrice')->where('masterpos_id',$id)->get();
        return view('masterpos.edit',compact('masterpos','customers','detailspos','products','orderstats','categories'));
    }

    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
       $masterpos=Masterpos::find($id);

        $masterpos->delete();
        session()->flash('success', __('siteAr.deleted_successfullly'));
        return redirect()->route('masterpos.index');
    }


    public function DetailsposDelete($id)
    {
        $Detailspos=Detailspos::find($id);
        $Detailspos->delete();
        session()->flash('success', __('siteAr.deleted_successfullly'));
        return redirect()->route('masterpos.index');
    }

}
