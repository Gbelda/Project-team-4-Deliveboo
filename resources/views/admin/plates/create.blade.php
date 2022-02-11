@extends('layouts.admin')

@section('content')


    @include('partials.errors')

    <div class="container">
        <h1>Create a new Product</h1>

        <form action="{{ route('admin.plates.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name " class="form-label">Titolo</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is_invalid @enderror"
                    placeholder="Lenovo Laptop" aria-describedby="nameHelper">
                <small id="nameHelper" class="text-muted" value="{{ old('name') }}">Type a name for your
                    product</small>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image " class="form-label">image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is_invalid @enderror"
                    placeholder="https://" aria-describedby="imageHelper" accept="images/*">
                <small id="imageHelper" class="text-muted">Type a image for your product</small>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients " class="form-label @error('ingredients') is_invalid @enderror">Ingredienti</label>
                <input type="text" name="ingredients" id="ingredients" class="form-control" placeholder=""
                    aria-describedby="ingredientsHelper">
                <small id="ingredientsHelper" class="text-muted" value="{{ old('ingredients') }}">Type a ingredients
                    for
                    your product</small>
                @error('ingredients')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price " class="form-label">Prezzo</label>
                <input type="text" name="price" id="price" class="form-control @error('price') is_invalid @enderror"
                    placeholder="Lenovo Laptop" aria-describedby="priceHelper">
                <small id="priceHelper" class="text-muted" value="{{ old('price') }}">Type a price for your
                    product</small>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            {{-- <div class="mb-3">
                <label for="category" class="form-label">Categories</label>
                <select class="form-control @error('category') is_invalid @enderror" name="category" id="category">
                    <option value="" selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            {{-- <div class="mb-3">
      <label for="tags" class="form-label">Tags</label>
      <select multiple class="form-select" name="tags" id="tags">
        <option disabled>Select all tags</option>
        
        @foreach ($tags as $tag)
        <option value="{{$tag->id}}">{{$tag->name}}</option> 
        @endforeach
      </select>
    </div> --}}

            <div class="mb-3">
                <label for="description " class="form-label">Corpo</label>
                <textarea class="form-control @error('description') is_invalid @enderror" name="description"
                    id="description" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="available" id="available1" value="1">
                    <label class="form-check-label" for="available1">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="available" id="available2" value="0">
                    <label class="form-check-label" for="available2">
                        No
                    </label>
                </div>

                @error('available')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-dark">Save</button>
        </form>
    </div>


@endsection
