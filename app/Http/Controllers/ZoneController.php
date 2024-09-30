<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Zone;

class ZoneController extends Controller
{

    public  function index(Request $request)
    {

        $zones=Zone::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like','%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('zones.zones', compact('zones'));


    }
    function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:cities,name',
        ]);

        $zone=Zone::create([  'name'=> $request->name,]);

        session()->flash('success', __('siteAr.added_successfully'));
        //    return redirect(route('dashboard.units.units'));
        return redirect()->route('zones.index');
    }
    public function edit(Zone $zone)
    {

        return view ('zones.edit',
            compact('zone'));
    }
    public  function show (Zone $zone)
    {

    }
    public function update(Request $request, Zone $zone)
    {
        $request->validate([
            'name' => 'required|unique:cities,name,'.$zone->id,
        ]);
        $zone->name=$request->name;
        $zone->save();
        session()->flash('success', __('siteAr.added_successfully'));

        return redirect()->route('zones.index');
    }
    public function destroy(Zone $zone)
    {
        $zone->delete();
        session()->flash('success', __('siteAr.deleted_successfullly' ));
        return redirect()->route('zones.index');
    }



}
