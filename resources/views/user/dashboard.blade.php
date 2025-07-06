@extends('user.layouts.master')

@section('title', 'Beranda')

@section('content')
<!-- ======= Hero Slider Section ======= -->
<section id="hero-slider" class="hero-slider">
    <div class="container-md" data-aos="fade-in">
        <div class="row">
            <div class="col-12">
                <div class="swiper sliderFeaturedPosts">
                    <div class="swiper-wrapper">
                        @foreach ($carousels as $carousel)
                        <div class="swiper-slide">
                            <a href="{{ route('user.blog.show', ['blog' => $carousel->slug]) }}"
                                class="img-bg d-flex align-items-end"
                                style="background-image: url('{{ asset('storage/' . $carousel->cover_image) }}');">
                                <div class="img-bg-inner">
                                    <h2>{{ $carousel->title }}</h2>
                                    <p>{{ $carousel->description }}</p>
                                </div>
                            </a>

                        </div>
                        @endforeach

                    </div>
                    <div class="custom-swiper-button-next">
                        <span class="bi-chevron-right"></span>
                    </div>
                    <div class="custom-swiper-button-prev">
                        <span class="bi-chevron-left"></span>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero Slider Section -->

<!-- ======= Post Grid Section ======= -->
<section id="posts" class="posts">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">

            <!-- Bagian Kiri - Blog Utama -->
            <div class="col-lg-4">
                <div class="post-entry-1 lg">
                    <a href="{{ route('user.blog.show', $mainBlog) }}"
                        class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block"
                        style="width: 100%; height: auto; overflow: hidden;">
                        <img src="{{ asset('storage/' . ($mainBlog->cover_image ?? 'images/default.jpg')) }}"
                            class="w-100 h-100" style="object-fit: cover;" alt="{{ $mainBlog->title }}">
                    </a>
                    <div class="post-meta">
                        <span class="date">Blog</span>
                        <span class="mx-1">&bullet;</span>
                        <span>{{ $mainBlog->created_at->format('M jS Y') }}</span>
                    </div>
                    <h2><a href="{{ route('user.blog.show', $mainBlog) }}">{{ $mainBlog->title }}</a></h2>
                    <p class="mb-4 d-block">{{ Str::limit(strip_tags($mainBlog->description), 300) }}</p>
                    <div class="d-flex align-items-center author">
                        <div class="photo rounded-circle overflow-hidden" style="width: 40px; height: 40px;">
                            <img src="{{ asset('storage/' . $mainBlog->author->profile) }}"
                                alt="{{ $mainBlog->author->username }}" class="img-fluid w-100 h-100 object-fit-cover">
                        </div>
                        <div class="name">
                            <h3 class="m-0 p-0">{{ $mainBlog->author->username }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian Kanan - Blog Lainnya -->
            <div class="col-lg-8">
                <div class="row g-5">
                    @foreach ($otherBlogs->chunk(3) as $columnBlogs)
                    <div class="col-lg-4 border-start custom-border">
                        @foreach ($columnBlogs as $blog)
                        <div class="post-entry-1">
                            <a href="{{ route('user.blog.show', $blog) }}"
                                class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block"
                                style="width: 100%; height: auto; overflow: hidden;">
                                <img src="{{ asset('storage/' . ($blog->cover_image ?? 'images/default.jpg')) }}"
                                    class="w-100 h-100" style="object-fit: cover;" alt="{{ $blog->title }}">
                            </a>
                            <div class="post-meta">
                                <span class="date">Blog</span>
                                <span class="mx-1">&bullet;</span>
                                <span>{{ $blog->created_at->format('M jS Y') }}</span>
                            </div>
                            <h2><a href="{{ route('user.blog.show', $blog) }}">{{ $blog->title }}</a></h2>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    <!-- Trending Section -->
                    <div class="col-lg-4">
                        <div class="trending">
                            <h3>Trending</h3>
                            <ul class="trending-post">
                                @foreach ($trendings as $trending)
                                <li>
                                    <a href="{{ route('user.blog.show', ['blog' => $trending] ) }}">
                                        <span class="number">{{ $loop->iteration }}</span>
                                        <h3>{{ $trending->title }}</h3>
                                        <span class="author">{{ $trending->author->username }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div> <!-- End Trending Section -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Post Grid Section -->

<!-- ======= Masakan Category Section ======= -->
<section class="category-section">
    <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5">
            <h2>Masakan</h2>
            <div><a href="#" class="more">Lihat Semua Masakan</a></div>
        </div>

        <div class="row">
            <div class="col-md-9">
                @if ($cookingBlogs->isNotEmpty())
                @php $first = $cookingBlogs->first(); @endphp
                <div class="d-lg-flex post-entry-2">
                    <a href="{{ route('user.blog.show', $first->slug) }}"
                        class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block"
                        style="width: 100%; height: auto; overflow: hidden;">
                        <img src="{{ asset('storage/' . $first->cover_image) }}" alt="{{ $first->title }}"
                            class="w-100 h-100" style="object-fit: cover;">
                    </a>

                    <div>
                        <div class="post-meta"><span class="date">Masakan</span> <span class="mx-1">&bullet;</span>
                            <span>{{ $first->created_at->format('M jS, Y') }}</span>
                        </div>
                        <h3><a href="{{ route('user.blog.show', $first->slug) }}">{{ $first->title }}</a></h3>
                        <p>{{ Str::limit($first->description, 150) }}</p>
                        <div class="d-flex align-items-center author">
                            <div class="photo rounded-circle overflow-hidden" style="width: 40px; height: 40px;">
                                <img src="{{ asset('storage/' . $first->author->profile) }}"
                                    alt="{{ $first->author->username }}" class="img-fluid w-100 h-100 object-fit-cover">
                            </div>
                            <div class="name">
                                <h3 class="m-0 p-0">{{ $first->author->username }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    @foreach ($cookingBlogs->skip(1) as $blog)
                    <div class="col-md-4 mb-4">
                        <div class="post-entry-1">
                            <a href="{{ route('user.blog.show', $blog->slug) }}"
                                class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block"
                                style="width: 100%; height: auto; overflow: hidden;">
                                <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}"
                                    class="w-100 h-100" style="object-fit: cover;">
                            </a>
                            <div class="post-meta">
                                <span class="date">Masakan</span> <span class="mx-1">&bullet;</span>
                                <span>{{ $blog->created_at->format('M jS, Y') }}</span>
                            </div>
                            <h2 class="mb-2"><a href="{{ route('user.blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                            </h2>
                            <span class="author mb-3 d-block">{{ $blog->author->username }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="col-md-3">
                @foreach ($cookingBlogs->skip(4)->take(6) as $blog)
                <div class="post-entry-1 border-bottom mb-3 pb-2">
                    <div class="post-meta">
                        <span class="date">Masakan</span> <span class="mx-1">&bullet;</span>
                        <span>{{ $blog->created_at->format('M jS, Y') }}</span>
                    </div>
                    <h2 class="mb-2"><a href="{{ route('user.blog.show', $blog->slug) }}">{{ $blog->title }}</a></h2>
                    <span class="author mb-3 d-block">{{ $blog->author->username }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Masakan Category Section -->

<!-- ======= Bola Category Section ======= -->
<section class="category-section">
    <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5">
            <h2>Bola</h2>
            <div><a href="category.html" class="more">Lihat semua Bola</a></div>
        </div>

        <div class="row">
            <div class="col-md-9 order-md-2">

                @php
                    $first = $soccerBlogs->first();
                    $second = $soccerBlogs->skip(1)->first();
                    $third = $soccerBlogs->skip(2)->first();
                    $fourth = $soccerBlogs->skip(3)->first();
                @endphp

                <!-- Post utama besar -->
                <div class="d-lg-flex post-entry-2">
                    <a href="{{ route('user.blog.show', $first->slug) }}"
                       class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block"
                       style="width: 100%; height: auto; overflow: hidden;">
                        <img src="{{ asset('storage/' . $first->cover_image) }}"
                             alt="{{ $first->title }}"
                             class="w-100 h-100"
                             style="object-fit: cover;">
                    </a>
                    <div>
                        <div class="post-meta">
                            <span class="date">Bola</span>
                            <span class="mx-1">&bullet;</span>
                            <span>{{ $first->created_at->format('M jS, Y') }}</span>
                        </div>
                        <h3><a href="{{ route('user.blog.show', $first->slug) }}">{{ $first->title }}</a></h3>
                        <p>{{ Str::limit($first->description, 150) }}</p>
                        <div class="d-flex align-items-center author">
                            <div class="photo rounded-circle overflow-hidden" style="width: 40px; height: 40px;">
                                <img src="{{ asset('storage/' . $first->author->profile) }}"
                                     alt="{{ $first->author->username }}"
                                     class="w-100 h-100"
                                     style="object-fit: cover;">
                            </div>
                            <div class="name ms-2">
                                <h3 class="m-0 p-0">{{ $first->author->username }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-4">
                        <div class="post-entry-1 border-bottom mb-4">
                            <a href="{{ route('user.blog.show', $second->slug) }}"
                               class="thumbnail d-inline-block mb-3"
                               style="width: 100%; height: auto; overflow: hidden;">
                                <img src="{{ asset('storage/' . $second->cover_image) }}"
                                     alt="{{ $second->title }}"
                                     class="w-100 h-100"
                                     style="object-fit: cover;">
                            </a>
                            <div class="post-meta">
                                <span class="date">Bola</span>
                                <span class="mx-1">&bullet;</span>
                                <span>{{ $second->created_at->format('M jS, Y') }}</span>
                            </div>
                            <h2 class="mb-2">
                                <a href="{{ route('user.blog.show', $second->slug) }}">{{ $second->title }}</a>
                            </h2>
                            <span class="author mb-3 d-block">{{ $second->author->username }}</span>
                            <p class="mb-4 d-block">{{ Str::limit($second->description, 150) }}</p>
                        </div>

                        <div class="post-entry-1">
                            <div class="post-meta">
                                <span class="date">Bola</span>
                                <span class="mx-1">&bullet;</span>
                                <span>{{ $third->created_at->format('M jS, Y') }}</span>
                            </div>
                            <h2 class="mb-2">
                                <a href="{{ route('user.blog.show', $third->slug) }}">{{ $third->title }}</a>
                            </h2>
                            <span class="author mb-3 d-block">{{ $third->author->username }}</span>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="post-entry-1">
                            <a href="{{ route('user.blog.show', $fourth->slug) }}"
                               class="thumbnail d-inline-block mb-4"
                               style="width: 100%; height: auto; overflow: hidden;">
                                <img src="{{ asset('storage/' . $fourth->cover_image) }}"
                                     alt="{{ $fourth->title }}"
                                     class="w-100 h-100"
                                     style="object-fit: cover;">
                            </a>
                            <div class="post-meta">
                                <span class="date">Bola</span>
                                <span class="mx-1">&bullet;</span>
                                <span>{{ $fourth->created_at->format('M jS, Y') }}</span>
                            </div>
                            <h2 class="mb-2">
                                <a href="{{ route('user.blog.show', $fourth->slug) }}">{{ $fourth->title }}</a>
                            </h2>
                            <span class="author mb-3 d-block">{{ $fourth->author->username }}</span>
                            <p class="mb-4 d-block">{{ Str::limit($fourth->description, 150) }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-3">
                @foreach ($soccerBlogs->skip(5)->take(6) as $blog)
                    <div class="post-entry-1 border-bottom mb-3 pb-2">
                        <div class="post-meta">
                            <span class="date">Bola</span>
                            <span class="mx-1">&bullet;</span>
                            <span>{{ $blog->created_at->format('M jS, Y') }}</span>
                        </div>
                        <h2 class="mb-2">
                            <a href="{{ route('user.blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                        </h2>
                        <span class="author mb-3 d-block">{{ $blog->author->username }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section><!-- End Bola Category Section -->
@endsection