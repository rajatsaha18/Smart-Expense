<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user           = Auth::user();
        $totalCategory  = Category::where('user_id',$user->id)->count();
        $totalExpense   = Transaction::where('user_id',$user->id)
                            ->where('type','expense')
                            ->sum('amount');
        $totalIncome    = Transaction::where('user_id',$user->id)
                            ->where('type','income')
                            ->sum('amount');
        $maxBudget      = Budget::with('category')
                            ->where('user_id',$user->id)
                            ->orderBy('amount','desc')
                            ->first();
        return view('user.index',compact('totalCategory','totalExpense','totalIncome','maxBudget'));
    }
}
