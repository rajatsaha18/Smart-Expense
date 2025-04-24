<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Pest\Plugins\Only;

class BudgetController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'admin')
        {
            $budgets = Budget::with('category')->orderBy('id','desc')->paginate(8);
        }
        else
        {
            $budgets = Budget::with('category')
                        ->where('user_id',Auth::id())
                        ->paginate(8);
        }
        return view('budget.index',compact('budgets'));
    }
    public function create()
    {
        $categories = Category::where('user_id',Auth::id())->get();
        return view('budget.create',compact('categories'));
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'month'         => 'required|date',
            'amount'        => 'required|numeric|min:0',
        ]);
        // create budget
        $month = $request->month . '-01';
        Budget::create([
            'user_id'       => Auth::id(),
            'category_id'   => $request->category_id,
            'month'         => $month,
            'amount'        => $request->amount,
        ]);

        return redirect()->route('budget.index')->with('success','Budget create successfully');
    }

    public function edit(Budget $budget)
    {
        Gate::authorize('update', $budget);
        $categories = Category::where('user_id',Auth::id())->get();
        return view('budget.edit',compact('budget','categories'));
    }

    public function update(Request $request, Budget $budget)
    {
        Gate::authorize('update', $budget);
        //validation
        $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'month'         => 'required|date',
            'amount'        => 'required|numeric|min:0',
        ]);
        //update
        $month = $request->month . '-01';
        $budget->update([
            'category_id'   => $request->category_id,
            'month'         => $month,
            'amount'        => $request->amount,
        ]);

        return redirect()->route('budget.index')->with('success','Budget Update successfully');
    }

    public function delete(Budget $budget)
    {
        $budget->delete();
        return redirect()->route('budget.index')->with('success','Budget Delete successfully');
    }
}
