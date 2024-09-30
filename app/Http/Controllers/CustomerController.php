<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Customer;




class CustomerController extends Controller
{

    public  function index(Request $request)
    {

       // $customers=Customer::paginate(5);

    //  return view('dashboard.customers.customers', compact('customers'));

        $customers = Customer::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like','%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('customers.customers', compact('customers'));

    }

    public  function  create()


    {
        $city=City::all();//get All city
        $max_customer=Customer::all()->max('id');// get max number and incrase 1
        $max_customer ++;
          return view ('customers.add',compact('city'),compact('max_customer'));


    }

    public  function show (customer $customer)
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:customers,name',
        ]);


            $customers=Customer::create([
                "code"=> $request->code,
                'name'=> $request->name,
                'city_id'=> $request->city_id,
                'tel1'=> $request->tel1,
                'tel2'=> $request->tel2,
                'address'=> $request->address,
                'memo'=> $request->memo,

        ]);





        session()->flash('success', __('siteAr.added_successfully'));
        return redirect()->route('customers.index');

    }





    public function edit(customer $customer)

    {
        $city=City::all();//get All city
        return view('customers.edit',
            compact('city','customer'));



    }



    public function update(Request $request, Customer $customer)
    {
        //
        $request->validate([
            'name'=>'required|unique:customers,name,'.$customer->id,
        ]);
        $customer->code=$request->code;
        $customer->name=$request->name;
        $customer->city_id=$request->city_id;
        $customer->tel1=$request->tel1;
        $customer->tel2=$request->tel2;
        $customer->address=$request->address;
        $customer->memo=$request->memo;
        $customer->save();
        session()->flash('success', __('siteAr.added_successfully'));
        return redirect()->route('customers.index');







    }


    public function destroy(Customer $customer)
    {
        //

        $customer->delete();
        session()->flash('success', __('siteAr.deleted_successfullly' ));
        return redirect()->route('customers.index');
    }
}
