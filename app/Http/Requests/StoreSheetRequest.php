<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSheetRequest extends FormRequest
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
            'title' => 'required|max:255',
            'instructions' => 'string|max:255',
            'place' => 'required|max:255',
            'sheet_level_id' => 'required|exists:sheet_levels,id',
            'week' => 'required|integer',
        ];
    }
}
