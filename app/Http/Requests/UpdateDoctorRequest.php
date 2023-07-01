<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'lastname' => 'required|max:50',   
            'address' => 'required|max:100',
            'phone' => 'required|max:10',
            'photo' => 'nullable|max:255',
            'cv' => 'nullable|max:255',
            'service' => 'required|max:100',
            'specializations' => ['exists:specializations,id']

    
        ];
    }
}
