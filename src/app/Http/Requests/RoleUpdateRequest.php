<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
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
            'name' => 'required|unique:roles,name,'.$this->role,
            'description' => 'nullable|string|max:250',
            'permission' => 'array',
            'permission.*' => 'exists:permissions,id'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Назва ролі',
            'permission' => 'Дозволи',
            'permission.*' => 'Дозволи'
        ];
    }
}
