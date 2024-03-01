@extends('layouts.app')

@section('page-title',  $comic->title.' Edit')

@section('main-content')
<h1 class="text-center">
   {{ $comic->title }} Edit
</h1>

<div class="container ">
   <div class="row">
      <div class="col py-4">
          <div class="mb-4">
              <a href="{{ route('comics.index') }}" class="btn btn-primary">
                  Torna all'index dei comics
              </a>
          </div>
          <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
               <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
               <input value="{{ $comic->title }}" type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo..." maxlength="64" required>
           </div>
            <div class="mb-3">
               <label for="description" class="form-label">Descrizione</label>
               <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione...">{{ $comic->description }}</textarea>
            </div>
            <div class="mb-3">
               <label for="thumb" class="form-label">Thumb <span class="text-danger">*</span></label>
               <input value="{{ $comic->thumb }}" type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci l'url dell'immagine..." >
           </div>
            <div class="mb-3">
               <label for="price" class="form-label">Prezzo</label>
               <input value="{{ $comic->price }}" type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo..." min="0.5" max="200">
            </div>
            <div class="mb-3">
               <label for="series" class="form-label">Serie </label>
               <input value="{{ $comic->series }}" type="text" class="form-control" id="series" name="series" placeholder="Inserisci la serie..." maxlength="64" required>
           </div>
            <div class="mb-3">
               <label for="sale_date" class="form-label">Data </label>
               <input value="{{ $comic->sale_date }}" type="date" class="form-control" id="sale_date" name="sale_date" placeholder="Inserisci la data" >
            </div>
            <div class="mb-3">
               <label for="type" class="form-label">Tipo</label>
               <input value="{{ $comic->type }}" type="text" class="form-control" id="type" name="type" placeholder="Inserisci il tipo" maxlength="64">
            </div>
            <div class="mb-3">
               @php
                  //manipolo la stringa $comic->artists per pulirla e far uscire una stringa di autori separati da virgola
                  $comic->artists = str_replace(['[', ']'], '', $comic->artists);
                  $comic->artists = str_replace(['"', '"'], '', $comic->artists);
               @endphp
               <label for="artists" class="form-label">Artisti</label>
               <textarea class="form-control" id="artists" name="artists" rows="3" placeholder="Inserisci gli artisti">{{ $comic->artists }}</textarea>
            </div>
            <div class="mb-3">
               @php
                  //manipolo la stringa $comic->artists per pulirla e far uscire una stringa di autori separati da virgola
                  $comic->writers = str_replace(['[', ']'], '', $comic->writers);
                  $comic->writers = str_replace(['"', '"'], '', $comic->writers);
               @endphp
               <label for="writers" class="form-label">Scrittori</label>
               <textarea class="form-control" id="writers" name="writers" rows="3" placeholder="Inserisci gli artisti">{{ $comic->writers }}</textarea>
            </div>
            <div>
               <button type="submit" class="btn btn-success w-100">
                     + Modifica
               </button>
            </div>
          </form>
      </div>
   </div>
</div>
@endsection
