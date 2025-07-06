@extends('admin.layouts.master')

@section('title', 'Carousel')

@section('content')
    <div class="card">
        <div class="card-header d-flex">
            
            <button class="btn btn-sm btn-primary ml-auto" data-toggle="modal" data-target="#addCarouselModal">
                <i class="fas fa-plus"></i>
            </button>

            <!-- Modal Tambah Carousel -->
            <div class="modal fade" id="addCarouselModal" tabindex="-1" role="dialog" aria-labelledby="addCarouselModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    @if ($carousels->count() < 4)
                        <form action="{{ route('admin.carousel.store') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCarouselModalLabel">Tambah Carousel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="blog_id">Pilih Blog</label>
                                        <select name="blog_id" id="blog_id" class="form-control" required>
                                            <option value="" hidden>-- Pilih Blog --</option>
                                            @forelse ($blogs as $blog)
                                                <option value="{{ $blog->id }}">{{ $blog->title }} - {{ $blog->author->username }}</option>
                                            @empty
                                                <option value="" disabled>Tidak ada blog yang dapat dipilih.</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <p>Carousel sudah mencapai batas.</p>
                    @endif
                </div>
            </div>

        </div>

        <div class="card-body">
            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Author</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carousels as $carousel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $carousel->blog->title }}</td>
                            <td>{{ $carousel->blog->author->username }}</td>
                            <td class="d-flex">
                                <form action="{{ route('admin.carousel.destroy', $carousel) }}" onclick="confirmation(event)" method="post" class="mx-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                                <a href="{{ route('admin.blog.detail', $carousel->blog) }}" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection