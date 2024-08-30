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
            'print_number' => ['required', 'string', 'max:255'],
            'ship_id' => ['required', 'exists:ships,id'],
            'arrive_number' => ['nullable', 'string', 'max:255'],
            'departure_number' => ['nullable', 'string', 'max:255'],
            'arrive_time' => ['required', 'date'],
            'departure_time' => ['required', 'date'],
            'origin_port' => ['required', 'exists:ports,id'],
            'destination_port' => ['required', 'exists:ports,id'],
            'situation' => ['nullable', 'string', 'max:255'],
            'file' => ['nullable', 'max:2048', 'mimes:pdf'],
        ];
    }
}
