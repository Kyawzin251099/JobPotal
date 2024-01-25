<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|min:4',
            'description'=>'required',
            'roles'=>'required',
            'address'=>'required',
            'position'=>'required',
            'last_date'=>'required',
            'number_of_vacany'=>'required',
            'experience'=>'required|numeric'
        ];
    }
}
