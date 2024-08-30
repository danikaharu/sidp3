<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'call_sign' => ['required', 'string', 'max:255'],
            'passenger_capacity' => ['required', 'string', 'max:255'],
            'vehicle_capacity' => ['required', 'string', 'max:255'],
            'weight' => ['required', 'numeric'],
            'flag' => ['required', 'string', 'max:255'],
            'skipper' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'imo_number' => ['required', 'numeric'],
            'crew_number' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'max:2048', 'mimes:jpg,jpeg,png']
        ];
    }
}
