@extends('layout.app')

@section('title')
Category
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-8 mx-auto">
                <h4 class="text-center text-success">Category Form</h4>
                <div class="card card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="category name"/>
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Type:</label>
                            <select name="type" class="form-select" required>
                                <option value="expense">Expense</option>
                                <option value="income">Income</option>
                            </select>
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" class="btn btn-success" value="Create Category"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
