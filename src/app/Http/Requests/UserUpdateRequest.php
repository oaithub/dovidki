<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role' => 'array',
            'role.*' => 'exists:roles,id'
        ];
    }

    public function attributes()
    {
        return [
            'role' => 'Ролі',
            'role.*' => 'Ролі'
        ];
    }
}
