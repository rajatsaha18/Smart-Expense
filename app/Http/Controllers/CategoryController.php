<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    public function index()
    {
        if(Auth::user()->role == 'admin')
        {
            $categories = Category::with('user')->orderBy('id','desc')->paginate(10);
        }
        else
        {
            $categories = Category::where('user_id',Auth::id())->orderBy('id','desc')->paginate(10);
        }

        return view('category.index',compact('categories'));
    }


    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        // create category
        Category::create([
            'user_id'   => Auth::id(), // here which user logged in
            'name'      => $request->name,
            'type'      => $request->type,
        ]);

        return redirect()->route('category.index')->with('success','Category Create Successfully');

    }

    public function edit(Category $category)
    {
        Gate::authorize('update',$category); // gate system check that current user logged in
        return view('category.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        Gate::authorize('update',$category);
        //validation
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        // update
        $category->update($request->only('name', 'type'));
        return redirect()->route('category.index')->with('success', 'Category Update Successfully');
    }

    public function delete(Category $category)
    {
        Gate::authorize('update',$category);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category Delete Successfully');
    }
}
