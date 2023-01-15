<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
        return [
            'name' => 'required|unique:projects|max:250|min:3',
            'content' => 'nullable',
            'cover_image' => 'nullable|image|max: 250',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Il name è obbligatorio.',
            'name.min' => 'Il name deve essere lungo almeno :min caratteri.',
            'name.max' => 'Il name non può superare i :max caratteri.',
            'name.unique:posts' => 'Il name esiste già'
        ];

    }
}
