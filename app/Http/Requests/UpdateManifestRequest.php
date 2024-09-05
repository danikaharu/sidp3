<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateManifestRequest extends FormRequest
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
            'adult_passenger' => ['required', 'string', 'max:255'],
            'child_passenger' => ['required', 'string', 'max:255'],
            'vehicle_passenger' => ['required', 'string', 'max:255'],
            'group_I' => ['required', 'string', 'max:255'],
            'group_II' => ['required', 'string', 'max:255'],
            'group_III' => ['required', 'string', 'max:255'],
            'group_IVA' => ['required', 'string', 'max:255'],
            'group_IVB' => ['required', 'string', 'max:255'],
            'group_VA' => ['required', 'string', 'max:255'],
            'group_VB' => ['required', 'string', 'max:255'],
            'group_VIA' => ['required', 'string', 'max:255'],
            'group_VIB' => ['required', 'string', 'max:255'],
            'group_VII' => ['required', 'string', 'max:255'],
            'group_VIII' => ['required', 'string', 'max:255'],
            'group_IX' => ['required', 'string', 'max:255'],
            'load_factor_passenger' => ['required', 'string', 'max:255'],
            'load_factor_vehicle' => ['required', 'string', 'max:255'],
            'bulk_goods' => ['required', 'string', 'max:255'],
            'description_bulk_goods' => ['required', 'string', 'max:255'],
            'situation' => ['required', 'string', 'max:255'],
            'file' => ['required', 'max:2048', 'mimes:pdf'],
        ];
    }
}
