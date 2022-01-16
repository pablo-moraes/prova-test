<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlowerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
//        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:flowers|max:255',
            'specie' => 'required|unique:flowers|max:255',
            'description' => 'nullable',
            'photo' => 'nullable',
            'bees' => 'required|array',
            'months' => 'required|array'
        ];
    }
}
