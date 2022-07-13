<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachers extends FormRequest
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
                'Email' => 'required|unique:teachers,Email,'.$this->id,
                'Password' => 'required',
                'First_name' => 'required',
                'Second_name' => 'required',
                'Last_name' => 'required',
                'Specialization_id' => 'required',
                'Nationalitie_id' => 'required',
                'Gender' => 'required',
                'DateOfBirth' => 'required|date|date_format:Y-m-d',
                'Age' => 'required',
                'Status' => 'required',
                'Address' => 'required',
                'Mobile' => 'required',


            ];

    }
    public function messages()
    {
        return [
            'Email.required' => 'هذا الحقل مطلوب',
            'Email.unique' => 'هذ االحقل موجود',
            'Password.required' => 'هذا الحقل مطلوب',
            'First_name.required' => 'هذا الحقل مطلوب',
            'Second_name.required' => 'هذا الحقل مطلوب',
            'Last_name.required' => 'هذا الحقل مطلوب',
            'Specialization_id.required' => 'هذا الحقل مطلوب',
            'Nationalitie_id.required' => 'هذا الحقل مطلوب',
            'Gender_id.required' => 'هذا الحقل مطلوب',
            'DateOfBirth.required' => 'هذا الحقل مطلوب',
            'Address.required' => 'هذا الحقل مطلوب',
            'Age.required' => 'هذا الحقل مطلوب',
            'Status.required' => 'هذا الحقل مطلوب',
            'Mobile.required' => 'هذا الحقل مطلوب',
        ];
    }
}

