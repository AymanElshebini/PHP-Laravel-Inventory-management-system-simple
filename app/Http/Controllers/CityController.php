<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use  App\City;

class CityController extends Controller
{


    public  function index(Request $request)
    {

        $cities=City::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like','%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('cities.cities', compact('cities'));


    }
    function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:cities,name',
        ]);

        $city=City::create([  'name'=> $request->name,]);

        session()->flash('success', __('siteAr.added_successfully'));
        //    return redirect(route('dashboard.units.units'));
        return redirect()->route('cities.index');
    }
    public function edit(City $city)
    {

        return view ('cities.edit',compact('city'));
    }
    public  function show (City $city)
    {

    }
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|unique:cities,name,'.$city->id,
        ]);
        $city->name=$request->name;
        $city->save();
        session()->flash('success', __('siteAr.added_successfully'));

        return redirect()->route('cities.index');
    }
    public function destroy(City $city)
    {
        $city->delete();
        session()->flash('success', __('siteAr.deleted_successfullly' ));
        return redirect()->route('cities.index');
    }




}
