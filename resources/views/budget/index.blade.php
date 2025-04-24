@extends('layout.app')

@section('title')
Budget
@endsection

@section('content')
<section class="py-5">
    <div class="container">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        <a href="{{ route('budget.create') }}" class="btn btn-success text-end"><i class="fa-solid fa-plus"></i> Add budget</a>
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Budget Table</h4>
            <div class="card card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            @if (auth()->user()->role == 'admin')
                            <th>User</th>
                            @endif
                            <th>Category</th>
                            <th>Month</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($budgets as $budget)
                        <tr>
                            <td>{{ $budgets->firstItem() + $loop->index }}</td>
                            @if (auth()->user()->role == 'admin')
                            <td>{{ $budget->user->name }}</td>
                            @endif
                            <td>{{ $budget->category->name }}</td>
                            <td>{{ $budget->month }}</td>
                            <td>{{ $budget->amount }}</td>
                            <td>
                                <a href="{{ route('budget.edit', $budget->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('budget.delete',$budget->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure delete this? ')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $budgets->links() }}
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
