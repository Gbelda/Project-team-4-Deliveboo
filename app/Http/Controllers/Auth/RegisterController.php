<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User as ModelsUser;
use App\Providers\RouteServiceProvider;
use App\User;
// use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {

        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'email.unique' => 'Questa :attribute è gia esistente.',
            'password.confirmed' => 'Le :attribute inserite devono essere uguali.',
        ];

        //$validator = Validator::make($input, $rules, $messages);

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'restaurant_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'max:15000'],
            'vat' => ['required', 'numeric', 'digits:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'categories' => ['required', 'exists:categories,id'],
        ], $messages);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'restaurant_name' => $data['restaurant_name'],
        //     'address' => $data['address'],
        //     'slug'=>Str::slug($data['restaurant_name']),
        //     'vat' => $data['vat'],
        //     'password' => Hash::make($data['password']),
        // ]);

        $validated = [

            'name' => $data['name'],
            'email' => $data['email'],
            'restaurant_name' => $data['restaurant_name'],
            'address' => $data['address'],
            'slug' => Str::slug($data['restaurant_name']),
            'vat' => $data['vat'],
            'password' => Hash::make($data['password']),
            'categories' => $data['categories'],
        ];

        if (array_key_exists('image', $data)) {
            $image_path = Storage::put('user_image', $data['image']);
            $validated['image'] = $image_path;
        }

        $new_user = User::create($validated);

        $new_user->categories()->attach($validated['categories']);

        return $new_user;
    }
}
