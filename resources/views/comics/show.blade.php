@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')
<h1 class="text-center">
   {{ $comic['title'] }}
</h1>
<div class="container">
   <div class="card">
      <div class="my-container-img">
         <img src="{{ $comic['thumb'] }}" class="card-img-top" alt="...">
      </div>
      <div class="card-body">
         <p>
            {{ $comic['description'] }}
         </p>
         <div>
            {{ $comic['series'] }}
         </div>
         <div>
            {{ $comic['sale_date'] }}
         </div>
         <div>
            {{ $comic['type'] }}
         </div>
         <div class="d-flex">
            <ul>
               {{-- ciclo interno per stampare gli artisit--}}
               @php
                  $artisti = json_decode($comic['artists']);
               @endphp
               @foreach ($artisti as $artist)
               <li>
                  {{ $artist }}
               </li>
               @endforeach
            </ul>
            <ul>
               {{-- ciclo interno per stampare scrittori --}}
               @php
                  $scrittori = json_decode($comic['writers']);
               @endphp
               @foreach ($scrittori  as $writer)
               <li>
                  {{ $writer }}
               </li>
               @endforeach
            </ul>
         </div>
         {{ "$".$comic['price'] }}
      </div>
    </div>
</div>


@endsection
