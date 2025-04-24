@extends('layout.app')

@section('title')
Transaction
@endsection

@section('content')
<section class="py-5">
    <div class="container">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        <a href="{{ route('transaction.create') }}" class="btn btn-success"> <i class="fa-solid fa-plus"></i> Add Transaction</a>
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center text-success">Transaction Table</h4>
                <form method="GET" action="{{ route('transaction.index') }}" class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label>From Date</label>
                        <input type="date" name="from_date" value="{{ request('from_date') }}" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>To Date</label>
                        <input type="date" name="to_date" value="{{ request('to_date') }}" class="form-control">
                    </div>

                    <div class="col-md-4 align-self-end">
                        <button class="btn btn-primary w-100" type="submit">Filter</button>
                    </div>
                </form>
            <div class="card card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                @if (auth()->user()->role == 'admin')
                                <th>User</th>
                                @endif
                                <th>Category</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transactions->firstItem() + $loop->index  }}</td>
                                @if (auth()->user()->role == 'admin')
                                <td>{{ $transaction->user->name }}</td>
                                @endif
                                <td>{{ $transaction->category->name }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->transaction_date }}</td>
                                <td>
                                    <a href="{{ route('transaction.edit',$transaction->id) }}" class="btn btn-warning mb-1 mr-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('transaction.delete',$transaction->id) }}" class="btn btn-danger mb-1 mr-3" onclick="return confirm('Are you sure delete this? ')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $transactions->links() }}
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
