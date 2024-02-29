@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')
<h1 class="text-center">
   Comic create
</h1>
<div class="container ">
   <div class="row">
      <div class="col py-4">
          <div class="mb-4">
              <a href="{{ route('comics.index') }}" class="btn btn-primary">
                  Torna all'index dei comics
              </a>
          </div>
          <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <div class="mb-3">
               <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
               <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo..." maxlength="64" required>
           </div>
            <div class="mb-3">
               <label for="description" class="form-label">Descrizione</label>
               <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione..."></textarea>
            </div>
            <div class="mb-3">
               <label for="thumb" class="form-label">Thumb <span class="text-danger">*</span></label>
               <input type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci l'url dell'immagine..." >
           </div>
            <div class="mb-3">
               <label for="price" class="form-label">Prezzo</label>
               <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo..." min="0.5" max="200">
            </div>
            <div class="mb-3">
               <label for="series" class="form-label">Serie </label>
               <input type="text" class="form-control" id="series" name="series" placeholder="Inserisci la serie..." maxlength="64" required>
           </div>
            <div class="mb-3">
               <label for="sale_date" class="form-label">Data </label>
               <input type="date" class="form-control" id="sale_date" name="sale_date" placeholder="Inserisci la data" >
            </div>
            <div class="mb-3">
               <label for="type" class="form-label">Tipo</label>
               <input type="text" class="form-control" id="type" name="type" placeholder="Inserisci il tipo" maxlength="64">
            </div>
            <div class="mb-3">
               <label for="artists" class="form-label">Artisti</label>
               <textarea class="form-control" id="artists" name="artists" rows="3" placeholder="Inserisci gli artisti"></textarea>
            </div>
            <div class="mb-3">
               <label for="writers" class="form-label">Scrittori</label>
               <textarea class="form-control" id="writers" name="writers" rows="3" placeholder="Inserisci gli artisti"></textarea>
            </div>
            <div>
               <button type="submit" class="btn btn-success w-100">
                     + Aggiungi
               </button>
            </div>
          </form>
      </div>
   </div>
</div>
@endsection
