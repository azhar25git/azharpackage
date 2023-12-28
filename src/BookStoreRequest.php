<?php

namespace Azhar25git\AzharPackage;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
        return [
            'title' => ['required', 'string', 'between:1,255'],
            'author' => ['required', 'string', 'between:1,255'],
            'description' => ['nullable', 'string', 'max:2000'],
        ];
    }

}