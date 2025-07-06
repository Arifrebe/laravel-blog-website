@extends('admin.layouts.master')

@section('title', 'Kategori ' .  $category->name)

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="card-title">Blog dengan kategori {{ $category->name }}</p>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Author</th>
                        <th>Di publish</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->author->username }}</td>
                            <td>{{ $blog->is_published ? 'ya' : 'tidak' }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection