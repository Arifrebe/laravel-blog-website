<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user')?->id;
        $isCreate = $this->routeIs('admin.user.store');

        return [
            'name' => ['required', 'max:255', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'username' => [
                'required', 'alpha_num', 'max:255',
                Rule::unique('users', 'username')->ignore($userId),
            ],
            'password' => [$isCreate ? 'required' : 'nullable', 'confirmed', 'min:6'],
            'profile' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'background' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:4096'],
            'role_id' => ['required', 'in:1,2,3'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'name.regex' => 'Nama hanya boleh berisi huruf, angka, dan spasi.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email ini sudah digunakan.',

            'username.required' => 'Nama pengguna wajib diisi.',
            'username.alpha_num' => 'Nama pengguna hanya boleh berisi huruf dan angka.',
            'username.max' => 'Nama pengguna tidak boleh lebih dari 255 karakter.',
            'username.unique' => 'Nama pengguna ini sudah digunakan.',

            'password.required' => 'Kata sandi wajib diisi.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal 6 karakter.',

            'profile.image' => 'File profil harus berupa gambar.',
            'profile.mimes' => 'Format gambar profil harus jpg, jpeg, atau png.',
            'profile.max' => 'Ukuran gambar profil maksimal 2MB.',

            'background.image' => 'File latar belakang harus berupa gambar.',
            'background.mimes' => 'Format gambar latar harus jpg, jpeg, atau png.',
            'background.max' => 'Ukuran gambar latar maksimal 4MB.',

            'role_id.required' => 'Peran wajib dipilih.',
            'role_id.in' => 'Peran yang dipilih tidak valid.',

            'facebook.url' => 'Tautan Facebook harus berupa URL yang valid.',
            'instagram.url' => 'Tautan Instagram harus berupa URL yang valid.',
            'twitter.url' => 'Tautan Twitter harus berupa URL yang valid.',

            'description.string' => 'Deskripsi harus berupa teks.',
        ];
    }
}
