@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.update',$category->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label">Create Category</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " value="{{ $category->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-outline-success">Update</button>
                        <a href="{{ route('category.index') }}" class="btn btn-outline-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
