@extends('layout.app')

@section('title')
Report
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <h3>Transaction Report</h3>
        <div class="row">
            <form method="GET" action="{{ route('report.index') }}" class="row g-3">
                <div class="col-md-3">
                    <label for="">From date</label>
                    <input type="date" name="from" class="form-control" value="{{ request('from') }}">
                </div>
                <div class="col-md-3">
                    <label for="">To date</label>
                    <input type="date" name="to" class="form-control" value="{{ request('to') }}">
                </div>
                <div class="col-md-3 align-self-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
                <div class="col-md-3 text-end align-self-end">
                    <a href="{{ route('report.export', ['type' => 'pdf', 'from' => request('from'), 'to' => request('to')]) }}" class="btn btn-danger">Export PDF</a>
                    {{-- <a href="{{ route('report.export', ['type' => 'excel', 'from' => request('from'), 'to' => request('to')]) }}" class="btn btn-success">Export Excel</a> --}}
                </div>
            </form>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                @if (auth()->user()->role == 'admin')
                                <th>User</th>
                                @endif

                                <th>Date</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transactions->firstItem() + $loop->index }}</td>
                                @if (auth()->user()->role == 'admin')
                                <td>{{ $transaction->user->name }}</td>
                                @endif
                                <td>{{ $transaction->transaction_date }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->category->name ?? 'N/A'}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
