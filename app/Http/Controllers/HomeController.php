<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalCategory = Category::count();
        $totalUsers    = User::where('role','user')->count();
        return view('home',compact('totalCategory','totalUsers'));
    }
    public function userList()
    {
        $users = User::where('role','user')->orderBy('id','desc')->paginate(8);
        foreach($users as $user)
        {
            $user->totalIncome  = $user->transactions()->where('type','income')->sum('amount');
            $user->totalExpense = $user->transactions()->where('type','expense')->sum('amount');
        }
        return view('user-list',compact('users'));
    }

    public function userView($id)
    {
        $user = User::find($id);
        $user->total_income = $user->transactions()->where('type', 'income')->sum('amount');
        $user->total_expense = $user->transactions()->where('type', 'expense')->sum('amount');
        return view('user-view',compact('user'));
    }

}
