<?php

namespace App\Http\Requests\Admin\Core;

use Illuminate\Foundation\Http\FormRequest;

class MediaLibararyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'file' => 'required|file|not_zip|max:1024',
            'med_group' => 'required',
            'resize_images' => 'nullable',
        ];
    }
}
