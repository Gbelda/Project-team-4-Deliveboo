@extends('layouts.admin')

@section('content')


    @include('partials.errors')

    <div class="container">
        <h1 class='pb-3'>Aggiungi Piatto</h1>

        <form action="{{ route('admin.plates.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name " class="form-label">Nome del Piatto*</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is_invalid @enderror"
                    placeholder="Nome del Piatto" aria-describedby="nameHelper" required>
                <small id="nameHelper" class="text-muted" value="{{ old('name') }}">Inserire il nome del piatto</small>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image " class="form-label">Immagine</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is_invalid @enderror"
                    aria-describedby="imageHelper" accept=".jpg, .jpeg, .png">
                <small id="imageHelper" class="text-muted">Caricare un immagine .jpg/.jpeg o .png. Massimo 1mb*</small>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients " class="form-label @error('ingredients') is_invalid @enderror">Ingredienti</label>
                <input type="text" name="ingredients" id="ingredients" class="form-control" placeholder=""
                    aria-describedby="ingredientsHelper">
                <small id="ingredientsHelper" class="text-muted" value="{{ old('ingredients') }}">Scrivi gli
                    ingredienti</small>
                @error('ingredients')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price " class="form-label">Prezzo*</label>
                <input type="number" name="price" id="price" class="form-control @error('price') is_invalid @enderror"
                    placeholder="0.0" step="0.01" min="0" aria-describedby="priceHelper"
                    onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                <small id="priceHelper" class="text-muted" value="{{ old('price') }}">Inserire il prezzo del
                    piatto</small>
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
                <label for="description " class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is_invalid @enderror" name="description"
                    id="description" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="available">Disponibilit&agrave;*</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="available" id="available1" value="1">
                    <label class="form-check-label" for="available1">
                        Disponibile
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="available" id="available2" value="0" required>
                    <label class="form-check-label" for="available2">
                        Non Disponibile
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
