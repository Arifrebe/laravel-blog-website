@extends('user.layouts.blog.master')

@section('title', $blog->title)

@section('content')
    <div class="single-post">
        <div class="post-meta">
            <span class="date">{{ $blog->category?->name }}</span> 
            <span class="mx-1">&bullet;</span> 
            <span>{{ $blog->created_at->format('M jS Y') }}</span>
        </div>
        <h1 class="mb-3">{{ $blog->title }}</h1>
        @if($blog->cover_image && file_exists(public_path('storage/' . $blog->cover_image)))
            <img src="{{ asset('storage/' . $blog->cover_image) }}"
                alt="{{ $blog->title }}"
                class="img-fluid rounded shadow-sm my-4 w-100 object-fit-cover"
                style="max-height: 480px; object-fit: cover;">
        @else
            <img src="{{ asset('assets/img/default-image.jpg') }}"
                alt="Gambar tidak tersedia"
                class="img-fluid rounded shadow-sm my-4 w-100"
                style="max-height: 480px; object-fit: cover;">
        @endif

        {!! $blog->content !!}
    </div>`
@endsection
