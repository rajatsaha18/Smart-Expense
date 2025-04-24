@extends('layout.app')

@section('title')
Profile
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
        @endif
        <h3 class="text-center text-success mb-3">Update Profile</h3>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Leave blank if keep old password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-cloud-arrow-up"></i> Update Profile</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
