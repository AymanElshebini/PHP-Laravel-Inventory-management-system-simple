<?php

namespace App\Http\Controllers;

use App\unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public  function index(Request $request)
    {

        $units =unit::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like','%' . $request->search . '%');

        })->latest()->paginate(5);

         return view('units.units', compact('units'));

    }

    function store(Request $request)
    {
           $request->validate([
               'name'=>'required|unique:units,name',
           ]);


           $units=unit::create([
               'name'=> $request->name,
               'unit_convert'=> $request->unit_convert,
           ]);

        session()->flash('success', __('siteAr.added_successfully'));
    //    return redirect(route('dashboard.units.units'));
        return redirect()->route('units.index');
    }

    public function edit(unit $unit)
    {


    return view ('dashboard.units.edit',compact('unit'));
    }

    public  function show (units  $units)
{

}



    public function update(Request $request,unit $units)
    {
        $request->validate([
            'name' => 'required|unique:units,name,'.$units->id,

        ]);


        $units->name=$request->name;
        $units->save();
        session()->flash('success', __('siteAr.added_successfully'));
  // return view('dashboard.units.units')->with(['units'=>$unit]);

     //   return redirect()-route('dashboard.units.units');
      //  return view('dashboard.units.units', compact('units'));
        return redirect()->route('units.index');
    }



    public function destroy(unit $unit)
    {

     $unit->delete();


      session()->flash('success', __('siteAr.deleted_successfullly' ));
       return redirect()->route('units.index');
    }



}
