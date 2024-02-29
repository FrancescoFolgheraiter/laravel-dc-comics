@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')
<h1>
   Comic create
</h1>

<div class="row">
   <div class="col py-4">
       <div class="mb-4">
           <a href="{{ route('comics.index') }}" class="btn btn-primary">
               Torna all'index delle paste
           </a>
       </div>
       
       <form action="{{ route('comics.store') }}" method="POST">
           @csrf

           <div class="mb-3">
               <label for="description" class="form-label">Descrizione</label>
               <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione..."></textarea>
           </div>

           <div>
               <button type="submit" class="btn btn-success w-100">
                   + Aggiungi
               </button>
           </div>

       </form>
   </div>
</div>
@endsection
