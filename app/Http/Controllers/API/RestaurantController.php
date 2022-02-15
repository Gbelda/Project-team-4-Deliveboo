<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\RestaurantResource;
use App\Models\Plate;
use App\Http\Resources\PlateResource;
use App\Models\Category;

class RestaurantController extends Controller
{
    public function index(){

        return RestaurantResource::collection(User::with(['categories'])->orderByDesc('id')->paginate(10));

    
    }

    public function show(User $restaurant)
    {


        $thisRestaurant = User::where('id', $restaurant->id)->first();

        return new RestaurantResource($thisRestaurant);

    }

    public function filter(Category $category){

        // return RestaurantResource::collection(User::with(['categories'])->orderByDesc('id')->paginate(10));

    }
}

