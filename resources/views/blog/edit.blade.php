@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blog.update',$blog->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label">Create Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " value="{{ $blog->title }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Create Content</label>
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror">{{ $blog->content }}</textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Select Category</label>
                            <select class="form-select" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-outline-success">Create</button>
                        <a href="{{ route('category.index') }}" class="btn btn-outline-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
