<?php

namespace App\Http\Controllers;





use Illuminate\Http\Request;
use App\Supplier;
use App\City;

class SupplierController extends Controller
{
    //


    public  function index(Request $request)
    {




        $suppliers = Supplier::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like','%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('supplier.suppliers', compact('suppliers'));


}

    public  function  create()

    {
        $city=City::all();
        $max_suppliers=Supplier::all()->max('id');
        $max_suppliers ++;


        return view ('supplier.add',compact('city'),compact('max_suppliers'));


    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|unique:suppliers,name',
        ]);


      //  dd($request);

           $suppliers=Supplier::create([
               "code"=> $request->code,
               "namecompany"=> $request->namecompany,
               'name'=> $request->name,
               'city_id'=> $request->city_id,
               'tel1'=> $request->tel1,
               'tel2'=> $request->tel2,
               'address'=> $request->address,
               'memo'=> $request->memo,




        ]);





        session()->flash('success', __('siteAr.added_successfully'));
        return redirect()->route('supplier.suppliers');


    }

    public function edit(Supplier $supplier)

    {
        $city=City::all();//get All city
        return view('supplier.edit',
            compact('city','supplier'));



    }

    public function update(Request $request, Supplier $supplier)
    {
        //
        $request->validate([
            'name'=>'required|unique:customers,name',
        ]);

        $supplier->code=$request->code;
        $supplier->pymentkind=$request->pymentkind;
        $supplier->city_id=$request->city_id;
        $supplier->phone1=$request->phone1;
        $supplier->phone2=$request->phone2;
        $supplier->phone3=$request->phone3;
        $supplier->email=$request->email;
        $supplier->status=$request->status;
        $supplier->momo=$request->momo;
        $supplier->credit=$request->credit;
        $supplier->debit=$request->debit;
        $supplier->blance=$request->blance;
        $supplier->userwhoadd=$request->userwhoadd;
        $supplier->userwhomodified=$request->userwhomodified;
        $supplier->userwhoDeleted=$request->userwhoDeleted;


        $supplier->save();
        session()->flash('success', __('siteAr.added_successfully'));
        return redirect()->route('suppliers');







    }


    public function destroy(Supplier $supplier)
    {
        //

        $supplier->delete();
        session()->flash('success', __('siteAr.deleted_successfullly' ));
        return redirect()->route('suppliers.index');
    }


}
