<?php

namespace App\Http\Requests;

use App\Order;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderCreateRequest extends FormRequest
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
        $correctGroups = Auth::user()->groups()->keys();
        $correctTypes = array_keys(Order::typeList());
        return [
            'group' => ['required', Rule::in($correctGroups)],
            'type' => ['required', Rule::in($correctTypes)],
        ];
    }
}
