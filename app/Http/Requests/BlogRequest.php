<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $isCreate = $this->isMethod('POST');

        return [
            'title'             => 'required|string|max:255',
            'description'       => 'required|string',
            'category_id'       => 'required|exists:categories,id',
            'cover_image'       =>  ($isCreate ? 'required' : 'nullable') . '|image|max:1024',
            'content'           => 'required|string',
            'tags'              => 'required|min:1',
            'is_published'      => 'boolean',
        ];
    }
    public function messages()
    {
        return [
            'title.required'         => 'Judul wajib diisi.',
            'title.max'              => 'Judul tidak boleh lebih dari :max karakter.',
            'description.required'   => 'Deskripsi wajib diisi.',
            'author_id.required'     => 'Penulis wajib dipilih.',
            'author_id.exists'       => 'Penulis tidak valid.',
            'category_id.required'   => 'Kategori wajib dipilih.',
            'category_id.exists'     => 'Kategori tidak valid.',
            'cover_image.required'   => 'Gambar cover wajib diunggah.',
            'cover_image.image'      => 'File cover harus berupa gambar.',
            'cover_image.max'        => 'Ukuran gambar maksimal 1MB.',
            'content.required'       => 'Konten wajib diisi.',
            'tags.required'          => 'Tag wajib diisi.',
            'tags.min'               => 'Minimal harus ada satu tag.',
            'is_published.boolean'   => 'Status publikasi tidak valid.',
        ];
    }
}
