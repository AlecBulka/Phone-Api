<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhoneRequest extends FormRequest
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
            'name' => 'required|string',
            'brand' => 'required|string',
            'os' => 'required|string',
            'cpu' => 'required|string',
            'gpu' => 'required|string',
            'screenSize' => 'required|numeric',
            'resolution' => 'required|string',
            'cameraMegapixels' => 'required|integer',
            'cameraQuality' => 'required|string',
            'ram' => 'required|integer',
            'internalStorage' => 'required|integer',
            'batteryCapacity' => 'required|integer',
            'simType' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5120'
        ];
    }
}
