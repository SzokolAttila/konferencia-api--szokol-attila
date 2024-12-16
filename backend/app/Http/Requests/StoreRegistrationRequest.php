<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
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
            "name" => ["required", "string", "between:1,255"],
            "vegetarian" => ["required", "boolean"],
            "date" => ["required", "date", "after_or_equal:2022-02-01", "before_or_equal:2022-03-14"],
            "arrived" => ["nullable", "date_format:H:i:s", "after_or_equal:08:00:00", "before_or_equal:14:00:00"]
        ];
    }
}
