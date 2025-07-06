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

    .upload-bg-label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(40, 167, 69, 0.8);
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
    }

    .upload-bg-label:hover {
        background: rgba(33, 136, 56, 0.9);
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

    .profile-upload-wrapper {
        margin-top: 60px;
        text-align: center;
    }

    .upload-btn {
        background: #007bff;
        color: #fff;
        padding: 8px 14px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        display: inline-block;
        transition: background 0.3s;
    }

    .upload-btn:hover {
        background: #0056b3;
    }

    .image-input {
        display: none;
    }
</style>
@endpush

<div class="image-section">
    <img id="background-preview"
         class="background-preview"
         src="{{ isset($user) && $user->background ? asset('storage/' . $user->background) : asset('image/blank_image.jpg') }}"
         alt="Pratinjau Latar Belakang">

    <label for="background-upload" class="upload-bg-label">
        <i class="fas fa-image"></i> Unggah Latar Belakang
    </label>
    <input type="file" id="background-upload" name="background" class="image-input" accept="image/*">

    <div class="profile-floating-wrapper">
        <img id="image-preview"
             class="image-preview"
             src="{{ isset($user) && $user->profile ? asset('storage/' . $user->profile) : asset('image/default-profile.png') }}"
             alt="Foto Profil">
    </div>
</div>

<div class="profile-upload-wrapper mb-3">
    <label for="image-upload" class="upload-btn">
        <i class="fas fa-camera"></i> Unggah Foto Profil
    </label>
    <input type="file" id="image-upload" name="profile" class="image-input" accept="image/*">
</div>


@error('profile')
    <div class="alert alert-danger text-center mt-3">
        {{ $message }}
    </div>
@enderror
@error('background')
    <div class="alert alert-danger text-center mt-3">
        {{ $message }}
    </div>
@enderror

<div class="row">
    <div class="form-group col-md-6 col-12">
        <label for="name">Nama Lengkap <span class="text-muted">(Hanya huruf dan angka)</span></label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $user->name ?? '') }}" placeholder="Masukkan nama lengkap" maxlength="255" required>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-6 col-12">
        <label for="username">Username <span class="text-muted">(Hanya huruf dan angka)</span></label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username', $user->username ?? '') }}" placeholder="Masukkan nama pengguna" maxlength="255" required>
        @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-6 col-12">
        <label for="email">Alamat Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Masukkan alamat email" maxlength="255" required>
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-6 col-12">
        <label for="password">Kata Sandi</label>
        <div class="input-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan kata sandi" maxlength="255" @if(Route::is('user.create')) required @endif>
            <button type="button" class="btn btn-outline-secondary togglePassword">
                <i class="fas fa-eye"></i>
            </button>
        </div>
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-6 col-12">
        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
        <div class="input-group">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" maxlength="255" @if(Route::is('user.create')) required @endif>
            <button type="button" class="btn btn-outline-secondary togglePassword">
                <i class="fas fa-eye"></i>
            </button>
        </div>
        @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-6 col-12">
        <label for="role_id">Sebagai</label>
        <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id" required>
            <option value="" hidden>Pilih Peran</option>
            <option value="1" {{ old('role_id', $user->role_id ?? '') == 1 ? 'selected' : '' }}>Admin</option>
            <option value="2" {{ old('role_id', $user->role_id ?? '') == 2 ? 'selected' : '' }}>Penulis</option>
            <option value="3" {{ old('role_id', $user->role_id ?? '') == 3 ? 'selected' : '' }}>Pengguna</option>
        </select>
        @error('role_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-6 col-12">
        <label for="facebook">Tautan Facebook <span class="text-muted">(opsional)</span></label>
        <input type="url" class="form-control @error('facebook') is-invalid @enderror" name="facebook" id="facebook" value="{{ old('facebook', $user->facebook ?? '') }}" placeholder="Contoh: https://facebook.com/nama">
        @error('facebook') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-6 col-12">
        <label for="instagram">Tautan Instagram <span class="text-muted">(opsional)</span></label>
        <input type="url" class="form-control @error('instagram') is-invalid @enderror" name="instagram" id="instagram" value="{{ old('instagram', $user->instagram ?? '') }}" placeholder="Contoh: https://instagram.com/nama">
        @error('instagram') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-md-6 col-12">
        <label for="twitter">Tautan Twitter <span class="text-muted">(opsional)</span></label>
        <input type="url" class="form-control @error('twitter') is-invalid @enderror" name="twitter" id="twitter" value="{{ old('twitter', $user->twitter ?? '') }}" placeholder="Contoh: https://twitter.com/nama">
        @error('twitter') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group col-12">
        <label for="description">Deskripsi</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4" placeholder="Tuliskan deskripsi tentang pengguna...">{{ old('description', $user->description ?? '') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

@push('script')
<script>
    // Toggle password visibility
    document.querySelectorAll(".togglePassword").forEach(button => {
        button.addEventListener("click", function () {
            let inputField = this.previousElementSibling;
            let icon = this.querySelector("i");

            if (inputField.type === "password") {
                inputField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                inputField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        });
    });

    // Preview profile
    document.getElementById('image-upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Preview background
    document.getElementById('background-upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('background-preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Username hanya huruf dan angka
    document.getElementById('username').addEventListener('input', function() {
        this.value = this.value.replace(/[^a-zA-Z0-9]/g, '');
    });
</script>
@endpush
