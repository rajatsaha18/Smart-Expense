@extends('layout.app')

@section('title')
Budget
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-8 mx-auto">
                <div class="text-end mb-3">
                    <a href="{{ route('budget.index') }}" class="btn btn-success"><i class="fa-solid fa-backward"></i> Back</a>
                </div>
                <h4 class="text-center text-success">Edit Budget Form</h4>
                <div class="card card-body">
                    <form action="{{ route('budget.update',$budget->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group mb-3">
                            <label for="">Category</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $budget->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }} ({{ ucfirst($category->type) }})</option>
                                @endforeach

                            </select>
                            <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Month</label>
                            <input type="month" name="month" value="{{ \Carbon\Carbon::parse($budget->month)->format('Y-m') }}" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Amount</label>
                            <input type="number" name="amount" value="{{ old('amount',$budget->amount) }}" class="form-control" placeholder="amount"/>
                            <span class="text-danger">{{ $errors->has('amount') ? $errors->first('amount') : '' }}</span>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-cloud-arrow-up"></i> Update Budget</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
