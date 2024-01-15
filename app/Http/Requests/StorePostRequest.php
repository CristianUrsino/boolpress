<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule; //importa Rule 

class StorePostRequest extends FormRequest
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
            'title'=>['required', 'min:3', 'max:200', 'unique:posts', Rule::unique('posts')->ignore($this->post)],
            'body'=>['nullable'],
            'image'=>['nullable','image'], // 'image' PER INSERIRE IMMAGINI
        ];
    }

    public function messages(){
        return [
            'title.required' => 'titolo obbligatorio',
            'title.min' => 'titolo :min caratteri',
            'title.max' => 'titolo :max caratteri',
            'title.unique' => ' titolo già esistente',
            'image.url' => 'L\'immagine deve essere url',
        ];
    }
}
