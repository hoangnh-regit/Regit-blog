<?php

namespace App\Http\Requests\Admin;

use App\Models\Blog;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:' . config('length.max_name'),
            'content' => 'required',
            'img' => 'nullable|image',
            'status' => ['required', Rule::in([Blog::STATUS_ACTIVE, Blog::STATUS_INACTIVE])],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ];
    }
}
