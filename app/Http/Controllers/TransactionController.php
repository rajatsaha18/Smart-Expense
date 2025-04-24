<?php

namespace App\Http\Controllers;

use App\Mail\BudgetExceedMail;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->role == 'admin')
        {
            $transactions = Transaction::orderBy('id','desc')->paginate(8);
        }
        else
        {
            $query = Transaction::where('user_id', Auth::id());

        // check from_date and to_date are provide in the request
        if($request->filled('from_date') && $request->filled('to_date'))
        {
            $query->whereBetween('transaction_date',[$request->from_date, $request->to_date]);
        }

        $transactions = $query->orderBy('id','desc')->paginate(8);
        }
        return view('transaction.index',compact('transactions'));
    }
    public function create()
    {
        $categories = Category::select('id', 'name', 'type')
                  ->where('user_id',Auth::id())
                  ->get();
        return view('transaction.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id'       => 'required|exists:categories,id',
            'type'              => 'required|in:income,expense',
            'amount'            => 'required|numeric',
            'transaction_date'  => 'required|date',
        ]);

        Transaction::create([
            'user_id'             => Auth::id(),
            'category_id'         => $request->category_id,
            'type'                => $request->type,
            'amount'              => $request->amount,
            'description'         => $request->description,
            'transaction_date'    => $request->transaction_date,
            'payment_method'      => $request->payment_method,
            'attachment'          => $request->attachment,
            'is_recurring'        => $request->has('is_recurring'),
        ]);

        if($request->type == 'expense')
        {
            $user = Auth::user();
            $category = Category::find($request->category_id);

            /*========current month========*/
            $month = now()->format('Y-m');

            /*=====budget of this category for current month====*/
            $budget = Budget::where('user_id', $user->id)
                        ->where('category_id', $category->id)
                        ->where('month','like',"$month%")
                        ->first();

            if($budget)
            {
                $totalSpent = Transaction::where('user_id', $user->id)
                                ->where('category_id', $category->id)
                                ->where('type','expense')
                                ->whereMonth('transaction_date',now()->month)
                                ->whereYear('transaction_date',now()->year)
                                ->sum('amount');

                //budget exceed email
                if($totalSpent > $budget->amount)
                {
                    /*==========email send code========*/
                    Mail::to($user->email)->send(new BudgetExceedMail($category->name,$totalSpent,$budget->amount));
                    /*==========email send code========*/

                    return redirect()->route('transaction.index')
                    ->with('success', 'Transaction added. 💸 Budget exceeded! Email sent to your inbox.');
                }
            }
        }

        return redirect()->route('transaction.index')->with('success','transaction create successfully');
    }

    public function edit(Transaction $transaction)
    {
        Gate::authorize('update',$transaction);

        $categories = Category::select('id', 'name', 'type')
                            ->where('user_id',Auth::id())
                            ->get();
        return view('transaction.edit',compact('transaction','categories'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'category_id'       => 'required|exists:categories,id',
            'type'              => 'required|in:income,expense',
            'amount'            => 'required|numeric',
            'transaction_date'  => 'required|date',
        ]);

        $transaction->update([
            'category_id'         => $request->category_id,
            'type'                => $request->type,
            'amount'              => $request->amount,
            'description'         => $request->description,
            'transaction_date'    => $request->transaction_date,
            'payment_method'      => $request->payment_method,
            'attachment'          => $request->attachment,
            'is_recurring'        => $request->has('is_recurring'),
        ]);
        return redirect()->route('transaction.index')->with('success','transaction update successfully');
    }

    public function delete(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transaction.index')->with('success','transaction delete successfully');
    }
}
