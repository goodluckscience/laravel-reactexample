<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyjobRequest extends FormRequest
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
            'property_id' => 'required|numeric',
            'jobsummary' => 'required|string|max:150',
            'jobdescription' => 'required|string|max:500',
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
        ];
    }
}
