@extends('admin.layouts.master')

@section('title','Blog')

@section('content')
<div class="card">
    <div class="card-header d-flex">
        <a href="{{ route('admin.blog.create') }}" class="btn btn-sm btn-primary ml-auto"><i class="fas fa-plus"></i></a>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Di publish</th>
                    <th>Pembaca</th>
                    <th>Penulis</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->category->name }}</td>
                        <td>{{ $blog->is_published ? "Yes" : "No" }}</td>
                        <td>{{ $blog->views }}</td>
                        <td>{{ $blog->author->username }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                            <form action="{{ route('admin.blog.destroy', $blog) }}" onclick="confirmation(event)" method="post" class="mx-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                            <a href="{{ route('admin.blog.detail', $blog) }}" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection