<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
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
            'origin_port' => ['required', 'exists:ports,id'],
            'destination_port' => ['required', 'exists:ports,id'],
            'time' => ['required', 'date_format:"Y-m-d H:i'],
            'type' => ['required', 'in:1,2'],
            'recurrence.type' => ['nullable', 'in:daily,weekly,monthly,yearly'],
        ];
    }
}
