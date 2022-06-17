<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillMeralcoStoreRequest extends FormRequest
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
            'bill_code' => ['unique:bill_rentals'],
            'bill_rental_date' => ['required'],
            'bill_period_start' => ['required'],
            'bill_period_end' => ['required'],
            'bill_location' => ['required']
        ];
    }
}
