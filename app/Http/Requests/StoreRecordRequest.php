<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecordRequest extends FormRequest
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
            'description' => 'required|max:16777215',
            'release_date' => 'required|date',
            'part_number' => 'required|unique:records|max:255',
            'genre_id' => 'required|exists:genres,id',
            'format_id' => 'required|exists:formats,id',
            'origin_id' => 'required|exists:origins,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'image' => 'bail|image|max:10240|dimensions:max_width=1800,max_height=1800',
        ];
    }
}
