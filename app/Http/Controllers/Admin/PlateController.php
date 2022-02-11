<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        $plates = Plate::all();
        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=> ['required', 'unique:plates','max:200'],
            'ingredients'=> ['nullable'],
            'price'=> ['nullable'],
            'image'=>['nullable', 'image', 'max:1000'],
            'description'=>['nullable'],
            // 'category_id' => ['nullable', 'exists:categories,id'],
         
            ]);

            if($request->file('image')){
                $image_path = Storage::put('plate_images', $request->file('image'));
                //$image_path= $request->file('image')->store('plate_images');
                $validated['image'] = $image_path;

            }

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
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        // if(Auth::id() === $plate->user_id) {
            return view('admin.plates.edit', compact('plate'));
        // } else{
        //     abort(403);
        // }
        
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
        // if(Auth::id() === $plate->user_id) {
            $validated=$request->validate([
                'name'=> ['required', Rule::unique('plates')->ignore($plate->id),'max:200'],
                'ingredients'=> ['nullable'],
                'price'=> ['nullable'],
                'image'=>['nullable','image', 'max:1000'],
                'description'=>['nullable'],
                // 'category_id' => ['nullable', 'exists:categories,id'],
                
                ]);
                
                // $validated['slug'] = Str::slug($validated(['title']));
    
                if($request->file('image')){    
                    Storage::delete($plate->image);
    
                    $image_path= $request->file('image')->store('images');
                    $validated['image'] = $image_path;
    
                }
                // if($request->has('tags')){
                //     $request->validate(['tags' => ['nullable','exists:tags,id']
                // ]);
                // $plate->tags()->sync($request->tags);
            // };
            $plate->update($validated);
                return redirect()->route('admin.plates.index');
                
        // } else {
        //     abort(403);
        // }
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
    }
}
