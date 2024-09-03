<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSailingWarrantRequest extends FormRequest
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
            'schedule_id' => ['required', 'exists:schedules,id'],
            'print_number' => ['required', 'string', 'max:255'],
            'arrive_number' => ['nullable', 'string', 'max:255'],
            'departure_number' => ['nullable', 'string', 'max:255'],
            'situation' => ['nullable', 'string', 'max:255'],
            'file' => ['required', 'max:2048', 'mimes:pdf'],
        ];
    }
}
