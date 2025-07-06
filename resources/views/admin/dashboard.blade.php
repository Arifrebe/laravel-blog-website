@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
<!-- Statistik Pengguna -->
<div class="row mt-4">
    <div class="col-md-3">
        <div class="info-box bg-dark">
            <span class="info-box-icon"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Pengguna</span>
                <span class="info-box-number">{{ $userTotal }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-user-circle"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Punya Foto Profil</span>
                <span class="info-box-number">{{ $userWithProfile }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-secondary">
            <span class="info-box-icon"><i class="fas fa-image"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Punya Background</span>
                <span class="info-box-number">{{ $userWithBackground }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fab fa-facebook"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Isi Facebook</span>
                <span class="info-box-number">{{ $userWithFacebook }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fab fa-instagram"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Isi Instagram</span>
                <span class="info-box-number">{{ $userWithInstagram }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-info">
            <span class="info-box-icon"><i class="fab fa-twitter"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Isi Twitter</span>
                <span class="info-box-number">{{ $userWithTwitter }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Daftar Pengguna Terbaru -->
<div class="card mt-4">
    <div class="card-header bg-dark">
        <h3 class="card-title">Pengguna Terbaru</h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Bergabung</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($latestUsers as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role->name ?? '-' }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
