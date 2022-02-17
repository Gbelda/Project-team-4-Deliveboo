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
    public function index()
    {
        $restaurants = User::withFilters(
            request()->input('categories', []))->with(['categories'])->paginate(10);
            
        return RestaurantResource::collection($restaurants);

    
    }

    public function show(User $restaurant)
    {

        $thisRestaurant = User::where('id', $restaurant->id)->first();

        return new RestaurantResource($thisRestaurant);
    }

}