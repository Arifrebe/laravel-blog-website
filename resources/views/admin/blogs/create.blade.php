@extends('admin.layouts.master')

@section('title','Buat blog')

@section('content')
<div class="card">
    <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @include('admin.blogs.form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Buat</button>
        </div>
    </form>
</div>
@endsection