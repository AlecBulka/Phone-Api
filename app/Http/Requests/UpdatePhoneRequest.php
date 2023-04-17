<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhoneRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'brand' => 'string',
            'os' => 'string',
            'cpu' => 'string',
            'gpu' => 'string',
            'screenSize' => 'numeric',
            'resolution' => 'string',
            'cameraMegapixels' => 'integer',
            'cameraQuality' => 'string',
            'ram' => 'integer',
            'internalStorage' => 'integer',
            'batteryCapacity' => 'integer',
            'simType' => 'string',
            'price' => 'numeric'
        ];
    }
}
