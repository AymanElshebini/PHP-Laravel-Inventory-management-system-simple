<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users=User::paginate(5);//أحضار جميع اليونت من قاعدة البيانات


        return view('dashboard.users.users')->with(['users'=>$users]);


    }


    public function create()
    {
        return view('dashboard.users.add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|unique:users,email',
        ]);

        $user=User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>Hash::make($request->password),
            'phone'=> $request->phone,
            'type'=> $request->type,
            'status'=> $request->status,
            'memo'=> $request->memo,
        ]);



        session()->flash('success', __('siteAr.added_successfully'));
        return redirect()->back();

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
