@extends('admin.layouts.master')

@section('title', 'Edit pengguna')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.user.update', $user) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.users.form')

            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
</div>
@endsection