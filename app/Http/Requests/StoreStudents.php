<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudents extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:students,email,'.$this->id,
            'password' => 'required|string|min:6|max:10',
            'gender_id' => 'required',
            'nationalitie_id' => 'required',

            'Mobile'=>'required',
            'Age'=>'required',
            'Address'=>'required',

            'Date_Birth' => 'required|date|date_format:Y-m-d',
            'Grade_id' => 'required',

            'section_id' => 'required',

            'academic_year' => 'required',
        ];
    }


}
