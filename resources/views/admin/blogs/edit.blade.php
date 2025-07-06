@extends('admin.layouts.master')

@section('title','Ubah blog')

@section('content')
<div class="card">
    <form action="{{ route('admin.blog.update', $blog) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            @include('admin.blogs.form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
</div>
@endsection