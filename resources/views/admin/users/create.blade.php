@extends('admin.layouts.master')

@section('title', 'Tambah pengguna')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.users.form')

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection