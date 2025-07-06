<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarouselRequest extends FormRequest
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
        $carouselId = $this->route('carousel')?->id;

        return [
            'blog_id' => [
                'required', 'exists:blogs,id', 
                Rule::unique('carousels', 'blog_id')->ignore($carouselId),
            ]
        ];
    }
}
