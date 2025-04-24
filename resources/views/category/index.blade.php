@extends('layout.app')

@section('title')
Category
@endsection

@section('content')
<section class="py-5">
    <div class="container">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif


        <a href="{{ route('category.create') }}" class="btn btn-success text-end"><i class="fa-solid fa-plus"></i> Add category</a>
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Category Table</h4>
            <div class="card card-body">
                <table class="table table-bordered" id="categoryTableBody">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            @if (auth()->user()->role == 'admin')
                            <th>User</th>
                            @endif
                            <th>Name</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $categories->firstItem() + $loop->index  }}</td>
                            @if (auth()->user()->role == 'admin')
                            <td>{{ $category->user->name }}</td>
                            @endif
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->type }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure delete this? ')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $categories->links() }}
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
