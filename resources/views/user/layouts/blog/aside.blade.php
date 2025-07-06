<div class="aside-block">

    <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular"
                type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Populer</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest"
                type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Terbaru</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
            <!-- Popular -->
            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                @foreach ($populars as $popular)
                        <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{ $popular->category->name }}</span> 
                                <span class="mx-1">&bullet;</span> <span>{{ $popular->created_at->format('M jS Y') }}</</span></div>
                        <h2 class="mb-2">
                                <a href="{{ route('user.blog.show', $popular) }}">{{ $popular->title }}</a>
                        </h2>
                        <span class="author mb-3 d-block">{{ $popular->author->username }}</span>
                        </div>
                @endforeach
        </div> <!-- End Popular -->

        <!-- Latest -->
        <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                @foreach ($latests as $latest)
                        <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{ $latest->category->name }}</span> 
                                <span class="mx-1">&bullet;</span> <span>{{ $latest->created_at->format('M jS Y') }}</</span></div>
                        <h2 class="mb-2">
                                <a href="{{ route('user.blog.show', $latest) }}">{{ $latest->title }}</a>
                        </h2>
                        <span class="author mb-3 d-block">{{ $latest->author->username }}</span>
                        </div>
                @endforeach
        </div> <!-- End Latest -->

    </div>
</div>

<div class="aside-block">
    <h3 class="aside-title">Kategori</h3>
    <ul class="aside-links list-unstyled">
        @forelse ($categories as $category)
            <li><a href="{{ route('user.category.index', $category) }}"><i class="bi bi-chevron-right"></i> {{ $category->name }}</a></li>
        @empty
            
        @endforelse
    </ul>
</div><!-- End Categories -->

<div class="aside-block">
    <h3 class="aside-title">Tag</h3>
    <ul class="aside-tags list-unstyled">
        @foreach ($tags as $tag)  
            <li><a href="{{ route('user.tag.index', $tag) }}">{{ $tag }}</a></li>
        @endforeach
    </ul>
</div><!-- End Tags -->