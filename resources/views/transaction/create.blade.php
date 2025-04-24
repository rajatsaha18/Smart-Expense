@extends('layout.app')

@section('title')
Transaction
@endsection

@section('content')
<section class="py-5">
    <div class="container">

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="text-end mb-3">
                    <a href="{{ route('transaction.index') }}" class="btn btn-success"><i class="fa-solid fa-backward"></i> Back</a>
                </div>
                <h4 class="text-center text-success">Transaction Form</h4>
                <div class="card card-body">
                    <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Category</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                                @endforeach

                            </select>
                            <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Type:</label>
                            <select name="type" class="form-select" required>
                                <option value="expense">Expense</option>
                                <option value="income">Income</option>
                            </select>
                            <span class="text-danger">{{ $errors->has('type') ? $errors->first('type') : '' }}</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Amount</label>
                            <input type="number" name="amount" class="form-control" placeholder="amount"/>
                            <span class="text-danger">{{ $errors->has('amount') ? $errors->first('amount') : '' }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Transaction date</label>
                            <input type="date" name="transaction_date" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('transaction_date') ? $errors->first('transaction_date') : '' }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Payment Method</label>
                            <input type="text" name="payment_method" class="form-control" placeholder="cash/bank"/>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Attachment</label>
                            <input type="file" name="attachment" class="form-control"/>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" placeholder="description"></textarea>
                        </div>
                        <div class="form-group form-check mb-3">
                            <input type="checkbox" name="is_recurring" class="form-check-input" id="is_recurring">
                            <label class="form-check-label" for="is_recurring">Recurring</label>
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" class="btn btn-success" value="Create Transaction"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
