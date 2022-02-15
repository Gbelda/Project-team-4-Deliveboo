<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PlateResource;
use App\Models\Plate;
use App\User;
use Illuminate\Support\Facades\Auth;

class PlateController extends Controller
{
    public function index(User $restaurant)
    {
        $plates = Plate::where('user_id', $restaurant->id)->get();

        return new PlateResource($plates);
    }
        

}
