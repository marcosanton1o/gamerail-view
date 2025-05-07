<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
    public function rules()
{
    return [
        'title' => 'required|string|min:2|max:30|unique:games,title',
        'price' => 'required',
        'game_category_id' => 'required',
        'release_date' => 'nullable|date',
        'developer_id' => 'required',
        'publisher_id' => 'required',
        'description' => 'nullable|string|min:2|max:200',
    ];
}
}
