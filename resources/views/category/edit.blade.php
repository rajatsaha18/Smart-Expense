@extends('layout.app')

@section('title')
Category
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-8 mx-auto">
                <h4 class="text-center text-success">Edit Category Form</h4>
                <div class="card card-body">
                    <form action="{{ route('category.update',$category->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ old('name',$category->name) }}" class="form-control" placeholder="category name"/>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Type:</label>
                            <select name="type" class="form-select" required>
                                <option value="expense" {{ $category->type == 'expense' ? 'selected' : '' }}>Expense</option>
                                <option value="income" {{ $category->type == 'income' ? 'selected' : '' }}>Income</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-cloud-arrow-up"></i> Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
