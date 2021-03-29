<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCateringRequest extends FormRequest
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
            'first_name'    => 'string',
            'last_name'     => 'string',
            'email'         => 'required|email',
            'phone_number'  => 'required|min:9',
            'comments'      => 'string|nullable',
            'number_of_guests'  => 'integer|min:3',
        ];
    }
}
