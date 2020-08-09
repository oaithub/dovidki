<?php

namespace App\Http\Requests;

use App\Rules\CorrectGroup;
use App\Rules\CorrectType;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

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
        $dateRules = 'required|date|after:'.now()->subYears(6)->format('M Y');
        return [
            'group' => ['required', new CorrectGroup],
            'type' => ['required', new CorrectType],
            'period_from' => $dateRules,
            'period_to' => $dateRules,
        ];
    }

    public function attributes()
    {
        return [
            'group' => 'Група',
            'type' => 'Тип довідки',
            'period_from' => 'Початок періоду',
            'period_to' => 'Кінець періоду'
        ];
    }
}
