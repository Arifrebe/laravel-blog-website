@extends('admin.layouts.master')

@section('title', 'Pengguna')

@section('content')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-user-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Sebagai</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>

                                <form action="{{ route('admin.user.destroy', $user) }}" method="post" class="mx-2" onsubmit="confirmation(event)">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>

                                <a href="{{ route('admin.user.show', $user) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection