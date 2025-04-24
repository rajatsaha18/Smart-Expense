@extends('layout.app')

@section('title')
User-List
@endsection

@section('content')
<section class="py-5">
    <div class="container">

        <div class="row">
            <div class="col-md-6 mx-auto">
                <a href="{{ route('user.list') }}" class="btn btn-success">Back</a>
                <h4 class="text-center">{{ $user->name }} Info</h4>
            <div class="card card-body">
                <table class="table table-bordered" id="categoryTableBody">

                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Total Income</th>
                            <td>{{ number_format($user->total_income) }}</td>
                        </tr>
                        <tr>
                            <th>Total Expense</th>
                            <td>{{ number_format($user->total_expense) }}</td>
                        </tr>

                    </tbody>
                </table>

            </div>
            </div>
        </div>
    </div>
</section>
@endsection
