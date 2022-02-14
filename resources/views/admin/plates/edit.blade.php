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
                    aria-describedby="nameHelper" value="{{ $plate->name }}" required>
                <small id="nameHelper" class="text-muted">Type a name for your
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
                    aria-describedby="ingredientsHelper" value="{{ $plate->ingredients }}">
                <small id="ingredientsHelper" class="text-muted">Type a ingredients
                    for
                    your product</small>
                @error('ingredients')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price " class="form-label @error('price') is_invalid @enderror">Prezzo</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="3.33"
                    aria-describedby="priceHelper" value="{{ $plate->price }}" required>
                <small id="priceHelper" class="text-muted">Type a price for your
                    product</small>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="category" class="form-label @error('category') is_invalid @enderror">Categories</label>
                <select class="form-control @error('category') is_invalid @enderror" name="category" id="category">
                    <option value="">Uncategorized</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}"
                            {{ $category->slug === $plate->category ? 'selected' : '' }}>
                            {{ $category->name }}</option>
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
                    rows="5">{{ $plate->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="available" id="available1" value="1"
                        {{ $plate->available === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="available1">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="available" id="available2" value="0"
                        {{ $plate->available === 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="available2" required>
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
