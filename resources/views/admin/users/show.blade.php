@extends('admin.layouts.master')

@section('title', $user->username)

@push('style')
<style>
    .image-section {
        position: relative;
        text-align: center;
        margin-bottom: 60px;
    }

    .background-preview {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-bottom: 3px solid #007bff;
    }

    .profile-floating-wrapper {
        position: absolute;
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%);
    }

    .image-preview {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #007bff;
        background: #fff;
    }

    .user-info {
        margin-top: 60px;
        text-align: center;
    }


    .user-info p {
        margin: 4px 0;
        color: #555;
    }

    .info-label {
        font-weight: bold;
        color: #333;
    }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="image-section">
            <img id="background-preview"
                 class="background-preview"
                 src="{{ $user->background ? asset('storage/' . $user->background) : asset('image/blank_image.jpg') }}"
                 alt="Pratinjau Latar Belakang">
        
            <div class="profile-floating-wrapper">
                <img id="image-preview"
                     class="image-preview"
                     src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('image/default-profile.png') }}"
                     alt="Foto Profil">
            </div>
        </div>
        
        <div class="user-info">
            <h3>{{ $user->name ?? 'Name Tidak Tersedia' }}</h3>

            <div class="mt-2">
                <p>
                    {{ '@' . $user->username ?? 'Username Tidak Tersedia' }}

                    @if ($user->role && $user->role->name === 'Admin')
                        <span class="badge bg-danger">Admin</span>
                    @elseif ($user->role && $user->role->name === 'Author')
                        <span class="badge bg-primary">Author</span>
                    @endif
                </p>
            </div>


            @if ($user->description)
                <div class="mt-3">
                    <p class="text-muted">{{ $user->description }}</p>
                </div>
            @endif


            <div class="row my-4">
                <div class="col-md-4 text-center">
                    @if ($user->facebook)
                        <a href="{{ $user->facebook }}" target="_blank" class="text-dark">
                            <i class="fab fa-facebook"></i> Facebook
                        </a>
                    @else
                        <span class="text-muted" style="cursor: not-allowed;">
                            <i class="fab fa-facebook"></i> Facebook
                        </span>
                    @endif
                </div>

                <div class="col-md-4 text-center">
                    @if ($user->instagram)
                        <a href="{{ $user->instagram }}" target="_blank" class="text-dark">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    @else
                        <span class="text-muted" style="cursor: not-allowed;">
                            <i class="fab fa-instagram"></i> Instagram
                        </span>
                    @endif
                </div>

                <div class="col-md-4 text-center">
                    @if ($user->twitter)
                        <a href="{{ $user->twitter }}" target="_blank" class="text-dark">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                    @else
                        <span class="text-muted" style="cursor: not-allowed;">
                            <i class="fab fa-twitter"></i> Twitter
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
