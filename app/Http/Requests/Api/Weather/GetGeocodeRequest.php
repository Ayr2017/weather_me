<?php

namespace App\Http\Requests\Api\Weather;

use Illuminate\Foundation\Http\FormRequest;

class GetGeocodeRequest extends FormRequest
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
            'q' => 'required|string|regex:/^[а-яА-Яa-zA-Z].*/',
            'limit' => 'nullable|int',
            'lang' => 'nullable|string',
            'country' => 'nullable|string',
        ];
    }

}
