@extends('layout.app')

@section('title')
User-List
@endsection

@section('content')
<section class="py-5">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">User List Table</h4>
            <div class="card card-body">
                <table class="table table-bordered" id="categoryTableBody">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Total Income</th>
                            <th>Total Expense</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $users->firstItem() + $loop->index  }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ number_format($user->totalIncome,2) }}</td>
                            <td>{{ number_format($user->totalExpense,2) }}</td>
                            <td>
                                <a href="{{ route('user.view',$user->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" class="btn btn-danger" onclick="return confirm('Are you sure delete this? ')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
