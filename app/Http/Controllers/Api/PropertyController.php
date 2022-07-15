<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Http\Resources\PropertyResource;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return PropertyResource::collection(Property::all());
    }
}
