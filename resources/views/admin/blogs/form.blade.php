@push('style')
<style>
    .img-preview-container {
        position: relative;
        width: 100%;
        max-width: 600px;
        aspect-ratio: 1.91 / 1;
        border: 1px solid #ced4da;
        background-color: #f8f9fa;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 1rem;
        margin-left: auto;
        margin-right: auto;
        border-radius: 10px;
    }

    .img-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none;
    }

    .image-input {
        display: none;
    }

    .image-button {
        background-color: #267ada;
        padding: 0.7rem 2.5rem;
        cursor: pointer;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .image-button:hover {
        background-color: #1a5fa4;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .image-button:active {
        background-color: #144d8d;
    }

    .info-icon-wrapper {
        position: relative;
        display: inline-block;
    }

    .info-icon {
        cursor: pointer;
        color: #17a2b8;
        padding-left: 5px;
    }

    .info-icon[data-tooltip]::after {
        content: attr(data-tooltip);
        position: absolute;
        right: 100%;
        top: 50%;
        transform: translateX(-10px) translateY(-50%);
        white-space: normal;
        background-color: #343a40;
        color: #fff;
        width: 200px;
        max-width: 300px;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
        z-index: 10;
        box-sizing: border-box;
        text-align: left;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease;
    }

    .info-icon:hover::after {
        opacity: 1;
        visibility: visible;
        transform: translateX(-10px) translateY(-50%);
    }
</style>
@endpush
    
<div class="form-group text-center">
    <label class="form-label">Gambar Thumbnail</label>

    <div class="button my-2">
        <label for="cover_image" class="image-button btn btn-primary">
            <i class="fas fa-camera"></i>
        </label>
        <input type="file" id="cover_image" name="cover_image" accept="image/*" class="image-input">
    </div>

    <div class="d-flex justify-content-center">
        <div class="img-preview-container">
            @php
                $image = isset($blog) && $blog->cover_image ? asset('storage/' . $blog->cover_image) : asset('image/default-blog.png');
            @endphp
            <img id="preview" class="img-preview" 
                src="{{ $image }}" 
                alt="Pratinjau Gambar"
                style="display: {{ $image ? 'block' : 'none' }};">
        </div>
    </div>

    @error('cover_image')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <div class="d-flex align-items-center justify-content-between">
        <label for="title">Judul</label>
        <div class="info-icon-wrapper d-flex">
            <small id="charCount" class="form-text text-muted">0/225 Karakter</small>
            <span class="info-icon" id="infoIconTitle" data-tooltip="Tips SEO: Buat judul yang unik dan deskriptif. Panjang judul memengaruhi SEO.">
                <i class="fa fa-info-circle"></i>
            </span>
        </div>
    </div>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukkan judul" value="{{ old('title', $blog->title ?? null) }}" maxlength="225" oninput="updateCharCount()" required>
    
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <small class="" style="visibility: hidden;" id="live-feedback"></small>    
</div>

<div class="mb-3">
    <div class="d-flex align-items-center justify-content-between">
        <label for="description">Deskripsi</label>
        <div class="info-icon-wrapper d-flex">
            <small id="descCharCount" class="form-text text-muted">0 Karakter</small> 
            <span class="info-icon" id="descInfoIcon" data-tooltip="Deskripsi harus jelas dan informatif. Panjang deskripsi memengaruhi SEO.">
                <i class="fa fa-info-circle"></i>
            </span>
        </div>
    </div>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Masukkan deskripsi" style="height: 120px;" oninput="updateDescCharCount()" required>{{ old('description', $blog->description ?? null) }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">    
    <label for="category_id">Kategori</label>
    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id" required>
        <option value="" hidden>Pilih kategori</option>
        @foreach($categories as $data)
            <option value="{{ $data->id }}" 
                {{ old('category_id', isset($blog) ? $blog->category_id : '') == $data->id ? 'selected' : '' }}>
                {{ $data->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="row">
    <div class="form-group col-md-10">
        @php
            $tags = '';

            if (isset($blog)) {
                $tagsData = $blog->tags;
                if (is_array($tagsData)) {
                    $tags = implode(',', $tagsData);
                } elseif (is_string($tagsData)) {
                    $tags = implode(',', json_decode($tagsData, true));
                }
            }
        @endphp
        <label for="tags" class="form-label">Tag</label>
        <input type="text" id="tags" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags', $tags)}}">

        @error('tags')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-2">
        <label class="form-label d-block">Publikasikan?</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input @error('is_published') is-invalid @enderror" type="radio" 
                name="is_published" id="published_yes" value="1" 
                {{ old('is_published', $blog->is_published ?? '1') == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="published_yes">Ya</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input @error('is_published') is-invalid @enderror" type="radio" 
                name="is_published" id="published_no" value="0" 
                {{ old('is_published', $blog->is_published ?? null) == '0' ? 'checked' : '' }}>
            <label class="form-check-label" for="published_no">Tidak</label>
        </div>
        @error('is_published')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="summernote" class="form-label">Konten</label>
    <textarea id="summernote" name="content" class="form-control @error('content') is-invalid @enderror">{{ old('content', $blog->content ?? null) }}</textarea>
    @error('content')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div> 


@push('script')
<script>
    document.querySelector('#cover_image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.querySelector('#preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    });

    function updateCharCount() {
        const titleInput = document.getElementById('title');
        const charCountDisplay = document.getElementById('charCount');
        const infoIconTitle = document.getElementById('infoIconTitle');
        const maxLength = titleInput.maxLength;
        const currentLength = titleInput.value.length;

        charCountDisplay.textContent = `${currentLength}/${maxLength} karakter`;

        if (currentLength === 0) {
            infoIconTitle.setAttribute('data-tooltip', "Masukkan judul yang unik dan deskriptif.");
            infoIconTitle.style.color = '#17a2b8';
        } else if (currentLength < 50) {
            infoIconTitle.setAttribute('data-tooltip', "Tips SEO: Usahakan minimal 50 karakter.");
            infoIconTitle.style.color = 'orange';
        } else if (currentLength > 60) {
            infoIconTitle.setAttribute('data-tooltip', "Tips SEO: Sebaiknya di bawah 60 karakter.");
            infoIconTitle.style.color = 'red';
        } else {
            infoIconTitle.setAttribute('data-tooltip', "Panjang judul sudah baik untuk SEO.");
            infoIconTitle.style.color = 'green';
        }
    }

    function updateDescCharCount() {
        const descInput = document.getElementById('description');
        const charCountDisplay = document.getElementById('descCharCount');
        const descInfoIcon = document.getElementById('descInfoIcon');
        const currentLength = descInput.value.length;

        charCountDisplay.textContent = `${currentLength} karakter`;

        if (currentLength === 0) {
            descInfoIcon.setAttribute('data-tooltip', "Masukkan deskripsi unik dengan kata kunci relevan.");
            descInfoIcon.style.color = '#17a2b8';
        } else if (currentLength < 150) {
            descInfoIcon.setAttribute("data-tooltip", "Tips SEO: Usahakan minimal 150 karakter.");
            descInfoIcon.style.color = 'orange';
        } else if (currentLength > 160) {
            descInfoIcon.setAttribute("data-tooltip", "Tips SEO: Sebaiknya di bawah 160 karakter.");
            descInfoIcon.style.color = 'red';
        } else {
            descInfoIcon.setAttribute("data-tooltip", "Panjang deskripsi sudah baik untuk SEO.");
            descInfoIcon.style.color = 'green';
        }
    }
</script>
@endpush