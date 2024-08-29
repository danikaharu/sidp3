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
            'ship_id' => ['required', 'exists:ships,id'],
            'type' => ['required', 'in:1,2'],
            'arrive_time' => ['required', 'date'],
            'departure_time' => ['required', 'date'],
            'origin_port' => ['required', 'exists:ports,id'],
            'destination_port' => ['required', 'exists:ports,id'],
            'file' => ['nullable', 'max:2048', 'mimes:pdf'],
        ];
    }
}
