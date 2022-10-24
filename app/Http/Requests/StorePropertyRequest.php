<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'title' => ['required','string','min:3','max:15'],
            'address' => ['required','string'],
            'city' => ['required','string'],
            'country' => ['required','string'],
            'image' => ['required',],
            'type' => ['required','string'],
            'description' => ['required','max:255'],
            'price' => ['required','integer'],
            'startDate'=>['required'],
            'endDate'=>['required']

        ];
    }
}
