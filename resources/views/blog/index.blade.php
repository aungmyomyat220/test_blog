@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('category.create') }}" class="btn btn-outline-success mb-2">Create</a>
                     <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Content</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $blog->title }}</td>
                                <td> <span class="badge text-bg-danger">{{ $blog->category->name }}</span> </td>
                                <td> {{ \Illuminate\Support\Str::limit($blog->content, 30, $end='...') }}</td>
                                <td>
                                    <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-warning">E</a>
                                    <form action="{{ route('blog.destroy',$blog->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">D</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
