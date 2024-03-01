@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')
<h1 class="text-center">
   Visualizza tutti i comics presenti
</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Titolo</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Serie</th>
            <th scope="col">Data vendita</th>
            <th scope="col">Tipo</th>
            <th scope="col">Artisti</th>
            <th scope="col">Scrittori</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comics as $comic)
        <tr>
            <td>{{ $comic->title }}</td>
            <td>{{ $comic->price }}</td> 
            <td>{{ $comic->series }}</td> 
            <td>{{ $comic->sale_date }}</td> 
            <td>{{ $comic->type }}</td>
            {{-- ciclo interno per stampare solo i primi 3 artisti --}}
            @php
                $artisti = json_decode($comic->artists);
                $i=0;
            @endphp
            <td> 
            @while ($i < count($artisti) && $i < 3)
                {{ $artisti[$i] }}
                @php
                    $i++;
                @endphp
            @endwhile
            </td> 
            {{-- ciclo interno per stampare solo i primi 3 scrittori --}}
            @php
                $scrittori = json_decode($comic->writers);
                $i=0;
            @endphp
            <td> 
            @while ($i < count($scrittori) && $i < 3)
                {{ $scrittori[$i]}}
                @php
                    $i++;
                @endphp
            @endwhile
            </td>
            <td class="d-flex">
                <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary">
                    Vedi
                </a>
                <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-warning">
                    Modifica
                </a>
                <form onsubmit="return confirm('Sei sicuro di voler eliminare questa voce?');"  action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Elimina
                        </button>
                </form>
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
