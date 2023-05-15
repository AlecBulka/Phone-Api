<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'brand' => $this->brand,
            'os' => $this->os,
            'cpu' => $this->cpu,
            'gpu' => $this->gpu,
            'screenSize' => $this->screenSize,
            'resolution' => $this->resolution,
            'cameraMegapixels' => $this->cameraMegapixels,
            'cameraQuality' => $this->cameraQuality,
            'ram' => $this->ram,
            'internalStorage' => $this->internalStorage,
            'batteryCapacity' => $this->batteryCapacity,
            'simType' => $this->simType,
            'price' => $this->price,
            'image' => $this->image
        ];
    }
}
