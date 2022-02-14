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
    public function index()
    {
        // return PlateResource::collection(Plate::where($user === plate['user_id']));
    }
        

}
