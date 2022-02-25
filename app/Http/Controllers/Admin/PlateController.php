<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Auth::user()->plates()->orderByDesc('id')->get();
        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        return view('admin.plates.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'image.image' => 'Il file non e accettato',
        ];

        $validated = $request->validate([
            'name' => ['required', 'max:200'],
            'ingredients' => ['nullable'],
            'price' => ['nullable'],
            'image' => ['nullable', 'image', 'max:50000'],
            'description' => ['nullable'],
            'available' => ['required'],
            '',
            // 'category_id' => ['nullable', 'exists:categories,id'],

        ]);

        if ($request->file('image')) {
            $image_path = Storage::put('plate_images', $request->file('image'));
            //$image_path= $request->file('image')->store('plate_images');
            $validated['image'] = $image_path;

        }

        //ddd($validated);

        // $validated['slug'] = Str::slug($validated['title']);

        $validated['user_id'] = Auth::id();

        $plate = Plate::create($validated);

        // if($request->has('tags')){
        //     $request->validate([
        //     'tags' => ['nullable', 'exists:tags,id']
        // ]);
        // $plate->tags()->attach($request->tags);
        // }

        return redirect()->route('admin.plates.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        if (Auth::id() === $plate->user_id) {
            $categories = Category::all();
            return view('admin.plates.show', compact('plate'));

        } else {
            abort(403);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        if (Auth::id() === $plate->user_id) {
            $categories = Category::all();
            return view('admin.plates.edit', compact('categories', 'plate'));

        } else {
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        if (Auth::id() === $plate->user_id) {
            $validated = $request->validate([
                'name' => ['required', 'max:200'],
                'ingredients' => ['nullable'],
                'price' => ['nullable'],
                'image' => ['nullable', 'image', 'max:50000'],
                'description' => ['nullable'],
                'available' => ['required'],
                // 'category_id' => ['nullable', 'exists:categories,id'],

            ]);

            // $validated['slug'] = Str::slug($validated(['title']));

            if ($request->file('image')) {
                Storage::delete($plate->image);

                $image_path = $request->file('image')->store('images');
                $validated['image'] = $image_path;

            }
            // if($request->has('tags')){
            //     $request->validate(['tags' => ['nullable','exists:tags,id']
            // ]);
            // $plate->tags()->sync($request->tags);
            // };
            $plate->update($validated);
            return redirect()->route('admin.plates.index');

        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        //
        $plate->delete();

        return redirect()->route('admin.plates.index')->with('message', 'Il tuo piatto ' . $plate->name . ' è stato eliminato correttamente');

    }
}