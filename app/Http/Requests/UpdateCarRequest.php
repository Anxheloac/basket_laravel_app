<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'make' => 'required|string|max:191',
            'model' => 'required|string|max:191',
            'registration_date' => 'required|date|date_format:m/d/Y|before:'.date('m/d/Y'),
            'engine_size' => 'required|numeric',
            'price' => 'required|numeric',
            'active' => 'nullable|boolean'
        ];
    }
}
