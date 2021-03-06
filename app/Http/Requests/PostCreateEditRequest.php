<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostCreateEditRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $post = Post::where('title', $this->title)->first();
        return [
            'title' => [
                'required',
                'min:2',
                'max:255',
                // 'unique:posts',
                // Rule::unique('posts')->ignore($post->id),
            ],
            'body' => 'required|min:2',
            'tags' => 'array',
        ];
    }

    public function messages()
    {
        return [
            'tags.array' => 'Please change the select back to an array.',
        ];
    }
}
