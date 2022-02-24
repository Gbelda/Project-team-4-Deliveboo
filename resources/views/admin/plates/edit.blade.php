@extends('layouts.admin')

@section('content')
    @include('partials.errors')

    <div class="container" id="edit">

        <h1 class="text-center section_title">MODIFICA PIATTO</h1>

        <form action="{{ route('admin.plates.update', $plate->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name " class="title_label form-label @error('name') is_invalid @enderror">Nome</label>
                <input type="text" name="name" id="name" class="form-control" aria-describedby="nameHelper"
                    value="{{ $plate->name }}" required>
                <small id="nameHelper" class="text-small">Inserire il nome del piatto</small>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image " class="title_label pt-2 form-label @error('image') is_invalid @enderror">Immagine
                    Piatto</label>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img width="100" src="{{ asset('storage/' . $plate->image) }}" alt="">
                        </div>
                    </div>
                </div>
                <input type="file" name="image" id="image" class="form-control mt-3" aria-describedby="imageHelper"
                    accept=".jpg, .jpeg, .png">
                <small id="imageHelper" class="text-small">Caricare un immagine .jpg/.jpeg o .png. Massimo 1mb*</small>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients "
                    class="title_label form-label @error('ingredients') is_invalid @enderror">Ingredienti</label>
                <input type="text" name="ingredients" id="ingredients" class="form-control" placeholder=""
                    aria-describedby="ingredientsHelper" value="{{ $plate->ingredients }}">
                <small id="ingredientsHelper" class="text-small">Scrivi gli ingredienti</small>
                @error('ingredients')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price " class="form-label title_label @error('price') is_invalid @enderror">Prezzo</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="3.33"
                    aria-describedby="priceHelper" value="{{ $plate->price }}" required>
                <small id="priceHelper" class="text-small">Inserire il prezzo del piatto</small>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="description "
                    class="title_label form-label @error('description') is_invalid @enderror">Descrizione</label>
                <textarea class="form-control" name="description" id="description"
                    rows="5">{{ $plate->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <h6 class="title_label">
                    Disponibile
                </h6>
                <div class="form-check">

                    <input class="form-check-input" type="radio" name="available" id="available1" value="1"
                        {{ $plate->available === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="available1">
                        Disponibile
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="available" id="available2" value="0"
                        {{ $plate->available === 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="available2" required>
                        Non Disponibile
                    </label>
                </div>

                @error('available')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn_save">Save</button>
        </form>
    </div>
@endsection
