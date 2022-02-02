<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookUserAreaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating' => 'required|between:1,5',
            'reading_from' => 'required|date',
            'reading_to' => 'nullable|date',
            'review' => 'nullable|string',
        ];
    }
}
