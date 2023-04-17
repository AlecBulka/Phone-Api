<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'os',
        'cpu',
        'gpu',
        'screenSize',
        'resolution',
        'cameraMegapixels',
        'cameraQuality',
        'ram',
        'internalStorage',
        'batteryCapacity',
        'simType',
        'price'
    ];
}
