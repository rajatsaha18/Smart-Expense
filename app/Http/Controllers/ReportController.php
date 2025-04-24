<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReportController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->role == 'admin')
        {
            $transactions = Transaction::orderBy('id','desc')->paginate(8);
        }
        else
        {
            $query = Transaction::where('user_id',Auth::id());

        if($request->filled('from') && $request->filled('to'))
        {
            $query->whereBetween('transaction_date',[$request->from,$request->to]);
        }

        $transactions = $query->orderBy('id','desc')->paginate(10);
        }

        return view('report.index',compact('transactions'));
    }

    public function export($type, Request $request)
    {
        $transactions = Transaction::where('user_id', Auth::id())
        ->when($request->filled('from') && $request->filled('to'),function($query) use ($request){
            $query->whereBetween('transaction_date',[$request->from,$request->to]);
        })->get();

        // check pdf
        if($type === 'pdf')
        {
            // total income calculate
            $totalIncome = Transaction::where('user_id',Auth::id())
                            ->where('type', 'income')
                            ->sum('amount');

            // total expense calculate
            $totalExpense = Transaction::where('user_id',Auth::id())
                            ->where('type', 'expense')
                            ->sum('amount');
            // download pdf
            $pdf = Pdf::loadView('report.pdf',compact('transactions','totalIncome','totalExpense'));
            return $pdf->download('report.pdf');
        }

        return back();

    }
}
