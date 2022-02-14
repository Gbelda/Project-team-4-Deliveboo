<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\RestaurantResource;

class RestaurantController extends Controller
{
    public function index(){
        return RestaurantResource::collection(User::with(['categories'])->get());
    }
}
