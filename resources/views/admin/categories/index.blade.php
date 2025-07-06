@extends('admin.layouts.master')

@section('title', 'Kategori')

@section('content')
    <div class="card" style="width: 25rem">
        <div class="card-header">
            <p class="card-title">Tambah kategori</p>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama kategori">

                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jumlah blog</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->blogs->count() }}</td>
                            <td class="d-flex">
                                <!-- Tombol buka modal -->
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal-{{ $category->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel-{{ $category->id }}">Edit Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.category.update', $category) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="name-{{ $category->id }}">Nama</label>
                                                        <input type="text" name="name" id="name-{{ $category->id }}" class="form-control @error('name')is-invalid @enderror" value="{{ $category->name }}">
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.category.destroy', $category) }}" method="post" class="mx-2" onsubmit="confirmation(event)">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>

                                <a href="{{ route('admin.category.show', $category) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection