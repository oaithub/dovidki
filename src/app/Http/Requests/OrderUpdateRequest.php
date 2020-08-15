<?php

namespace App\Http\Requests;

use App\Rules\CorrectState;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class OrderUpdateRequest extends FormRequest
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
            'state_id' => ['required', new CorrectState],
            'response_message' => 'required|string|max:700',
        ];
    }

    public function attributes()
    {
        return [
            'state_id' => 'Стан замовлення',
            'response_message' => 'Відповідь для користувача',
        ];
    }
}
