<?php

namespace App\Http\Requests;

use App\Models\Order;
use Auth;
use Carbon\Carbon;
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
        $correctTypes = Order::typeList()->keys();
        $dateRules = 'required|date|after:'.now()->subYears(6)->format('M Y');
        return [
            'group' => ['required', Rule::in($correctGroups)],
            'type' => ['required', Rule::in($correctTypes)],
            'period_from' => $dateRules,
            'period_to' => $dateRules,
        ];
    }
}
