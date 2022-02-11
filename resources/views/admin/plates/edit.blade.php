@extends('layouts.admin')

@section('content')


    @include('partials.errors')

    <div class="container">

        <h1>Update Plates</h1>

        <form action="{{ route('admin.plates.update', $plate->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name " class="form-label @error('name') is_invalid @enderror">Nome</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Lenovo Laptop"
                    aria-describedby="nameHelper">
                <small id="nameHelper" class="text-muted" value="{{ old('name') }}">Type a name for your
                    product</small>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('storage/' . $plate->image) }}" alt="">
                        </div>
                    </div>
                </div>
                <label for="image " class="form-label @error('image') is_invalid @enderror">Immagine Piatto</label>
                <input type="file" name="image" id="image" class="form-control" aria-describedby="imageHelper"
                    accept="images/*">
                <small id="imageHelper" class="text-muted">Type a image for your product, only jpg and png</small>
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
                <label for="price " class="form-label @error('price') is_invalid @enderror">Prezzo</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="3.33"
                    aria-describedby="priceHelper">
                <small id="priceHelper" class="text-muted" value="{{ old('price') }}">Type a price for your
                    product</small>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="mb-3">
        <label for="category_id" class="form-label @error('category_id') is_invalid @enderror">Categories</label>
        <select class="form-control @error('category_id') is_invalid @enderror" name="category_id" id="category_id">
            <option value="">Uncategorized</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" {{$category->id === $plate->category_id ? 'selected' : ''}}>{{$category->name}}</option> 
            @endforeach
        </select>
    </div> --}}
            {{-- <div class="mb-3">
        <label for="tags" class="form-label">Tags</label>
        <select multiple class="form-select" name="tags" id="tags">
          <option disabled>Select all tags</option>
          
          @foreach ($tags as $tag)
          <option value="{{$tag->id}}" {{$plate->tags->contains($tag->id ? 'selected' : '')}}>{{$tag->name}}</option> 
          @endforeach
        </select>
      </div> --}}

            <div class="mb-3">
                <label for="description " class="form-label @error('description') is_invalid @enderror">Descrizione</label>
                <textarea class="form-control" name="description" id="description"
                    rows="5">{{ old('description') }}</textarea>
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
