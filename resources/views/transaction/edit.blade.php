@extends('layout.app')

@section('title')
Transaction
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-8 mx-auto">
                <h4 class="text-center text-success">Transaction Form</h4>
                <div class="card card-body">
                    <form action="{{ route('transaction.update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-3">
                            <label for="">Category</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $transaction->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach

                            </select>
                            <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Type:</label>
                            <select name="type" class="form-select" required>
                                <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
                                <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                            </select>
                            <span class="text-danger">{{ $errors->has('type') ? $errors->first('type') : '' }}</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Amount</label>
                            <input type="number" name="amount" value="{{ old('amount',$transaction->amount) }}" class="form-control" placeholder="amount"/>
                            <span class="text-danger">{{ $errors->has('amount') ? $errors->first('amount') : '' }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Transaction date</label>
                            <input type="date" value="{{ old('transaction_date',$transaction->transaction_date) }}" name="transaction_date" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('transaction_date') ? $errors->first('transaction_date') : '' }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Payment Method</label>
                            <input type="text" name="payment_method" value="{{ old('payment_method',$transaction->payment_method) }}" class="form-control" placeholder="cash/bank"/>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" placeholder="description">{{ old('description', $transaction->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="is_recurring">Is Recurring?</label>
                            <input type="checkbox" name="is_recurring" id="is_recurring" @if(old('is_recurring', $transaction->is_recurring)) checked @endif>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-cloud-arrow-up"></i> Update Transaction</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
