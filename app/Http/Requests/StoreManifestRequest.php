<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManifestRequest extends FormRequest
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
            'type' => ['required', 'in:1,2,3'],
            'adult_passenger' => ['required', 'numeric'],
            'child_passenger' => ['required', 'numeric'],
            'vehicle_passenger' => ['required', 'numeric'],
            'group_I' => ['required', 'numeric'],
            'group_II' => ['required', 'numeric'],
            'group_III' => ['required', 'numeric'],
            'group_IVA' => ['required', 'numeric'],
            'group_IVB' => ['required', 'numeric'],
            'group_VA' => ['required', 'numeric'],
            'group_VB' => ['required', 'numeric'],
            'group_VIA' => ['required', 'numeric'],
            'group_VIB' => ['required', 'numeric'],
            'group_VII' => ['required', 'numeric'],
            'group_VIII' => ['required', 'numeric'],
            'group_IX' => ['required', 'numeric'],
            'load_factor_passenger' => ['required', 'numeric'],
            'load_factor_vehicle' => ['required', 'numeric'],
            'bulk_goods' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'description_bulk_goods' => ['required', 'string', 'max:255'],
            'vehicle_load' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'description_vehicle_load' => ['required', 'string', 'max:255'],
            'situation' => ['required', 'string', 'max:255'],
            'file' => ['required', 'max:2048', 'mimes:pdf'],
        ];
    }
}
