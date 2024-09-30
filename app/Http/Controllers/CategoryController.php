<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public  function index(Request $request)
    {

        $categories = Category::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like','%' . $request->search . '%');

        })->latest()->paginate(15);
          return view('categories.categories',compact('categories'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        $request->validate([

            'name'=>'required|unique:categories,name',
            "imgpath"  => "required"
        ]);
        /*uploades images*/
        $imgpath=$request->	imgpath;
        $imgpath_new_name=time().$imgpath->getClientOriginalName();
        $imgpath->move('uploads/category',$imgpath_new_name);

        /*uploades images*/

        $category= Category::create([
            "name"=>$request->name,
            "imgpath" =>'uploads/category/'.$imgpath_new_name

        ]);
        session()->flash('success', __('siteAr.added_successfully'));

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {

        $request->validate([

            'name'=>'required|unique:categories,name,'.$category->id,
        ]);

        if($request->hasFile('imgpath'))
        {
            $imgpath=$request->file('imgpath');
            $imgpath_new_name=time().$imgpath->getClientOriginalName();
            $imgpath->move('uploads/category/',$imgpath_new_name);
            $category->imgpath='uploads/category/'.$imgpath_new_name;

        }

        $category->name=$request->name;

        $category->save();



        session()->flash('success', __('siteAr.update_successfullly'));
        return redirect()->route('categories.index');


    }

    public function destroy(Category $category)
    {




        $category->delete();
        session()->flash('success', __('siteAr.deleted_successfullly'));
        return redirect()->route('categories.index');

    }
}

