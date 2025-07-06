@extends('user.layouts.blog.master')

@section('title', $title ?? 'indeks')


@section('content')
    <h3 class="category-title">{{ $title ?? 'Indeks blog' }}</h3>

    @forelse ($blogs as $blog)
        <div class="d-md-flex post-entry-2 small-img">
            <a href="{{ route('user.blog.show', $blog) }}" class="me-4 thumbnail">
                <img src="{{ asset('storage/'. $blog->cover_image) }}" alt="" class="img-fluid">
            </a>
            <div>
                <div class="post-meta">
                    <span class="date">{{ $blog->category->name }}</span> 
                    <span class="mx-1">&bullet;</span> 
                    <span>{{ $blog->created_at->format('M jS Y') }}</span>
                </div>
                <h3><a href="{{ route('user.blog.show', $blog) }}">{{ $blog->title }}</a></h3>
                <p>{{ \Illuminate\Support\Str::words($blog->description, 15, '...') }}</p>
                <div class="d-flex align-items-center author">
                    <div class="photo rounded-circle overflow-hidden" style="width: 40px; height: 40px;">
                            <img src="{{ asset('storage/' . $blog->author->profile) }}"
                                alt="{{ $blog->author->username }}" class="img-fluid w-100 h-100 object-fit-cover">
                        </div>
                    <div class="name">
                        <h3 class="m-0 p-0">{{ $blog->author->username }}</h3>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center my-5">
            <i class="bi bi-file-earmark-x fs-1 text-muted"></i>
            <h4 class="mt-3 text-muted">Tidak ada blog ditemukan.</h4>
            <p class="text-secondary">Coba kata kunci lain atau kembali nanti.</p>
        </div>
    @endforelse
    <div class="mt-4">
        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
@endsection