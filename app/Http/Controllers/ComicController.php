<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Model
use App\Models\Comic;
class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comicData =$request->validate([
            'title'=>'required|max:64',
            'description'=>'nullable|max:4096',
            'thumb'=>'nullable|url',
            'price'=>'nullable|numeric|min:0.5|max:30',
            'series'=>'nullable|string|max:300',
            'sale_date'=>'nullable|date',
            'type'=>'required|string|max:128',
            'artists'=>'required|string|max:640',
            'writers'=>'required|string|max:640',
        ],[
            'title.required' => 'Il titolo è obbligatorio.',
            'title.max' => 'Il titolo non può essere più lungo di :max caratteri.',
            'description.max' => 'La descrizione non può essere più lunga di :max caratteri.',
            'thumb.url' => 'Il link dell\'immagine in anteprima non è valido.',
            'price.numeric' => 'Il prezzo deve essere un numero.',
            'price.max' => 'Il prezzo non può superare :max cifre.',
            'series.max' => 'La serie non può essere più lunga di :max caratteri.',
            'sale_date.date' => 'La data di vendita non è valida.',
            'type.required' => 'Il tipo è obbligatorio.',
            'type.max' => 'Il tipo non può essere più lungo di :max caratteri.',
            'artists.required' => 'Gli artisti sono obbligatori.',
            'artists.max' => 'La lista degli artisti non può essere più lunga di :max caratteri.',
            'writers.required' => 'Gli scrittori sono obbligatori.',
            'writers.max' => 'La lista degli scrittori non può essere più lunga di :max caratteri.',
        ]);
        //$comicData = $request->all(); senza validation 

        $comic = new Comic();
        $comic->title = $comicData ['title'];
        $comic->description = $comicData ['description'];
        $comic->thumb = $comicData ['thumb'];
        $comic->price = floatval( $comicData ['price']);
        $comic->series = $comicData ['series'];
        $comic->sale_date =  $comicData ['sale_date'];
        $comic->type = $comicData ['type'];
        //salvo il testo degli artisti e lo converto in array
        $supportArray = explode(",", $comicData ['artists']);
        $comic->artists = json_encode($supportArray);
        $supportArray = explode(",", $comicData ['writers']);
        $comic->writers= json_encode($supportArray);
        $comic->save();
        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $comicData =$request->validate([
            'title'=>'required|max:64',
            'description'=>'nullable|max:4096',
            'thumb'=>'nullable|url',
            'price'=>'nullable|number|max:30',
            'series'=>'nullable|string|max:300',
            'sale_date'=>'nullable|date|max:300',
            'type'=>'required|string|max:128',
            'artists'=>'required|string|max:640',
            'writers'=>'required|string|max:640',
        ],[
            'title.required' => 'Il titolo è obbligatorio.',
            'title.max' => 'Il titolo non può essere più lungo di :max caratteri.',
            'description.max' => 'La descrizione non può essere più lunga di :max caratteri.',
            'thumb.url' => 'Il link dell\'immagine in anteprima non è valido.',
            'price.numeric' => 'Il prezzo deve essere un numero.',
            'price.max' => 'Il prezzo non può superare :max cifre.',
            'series.max' => 'La serie non può essere più lunga di :max caratteri.',
            'sale_date.date' => 'La data di vendita non è valida.',
            'type.required' => 'Il tipo è obbligatorio.',
            'type.max' => 'Il tipo non può essere più lungo di :max caratteri.',
            'artists.required' => 'Gli artisti sono obbligatori.',
            'artists.max' => 'La lista degli artisti non può essere più lunga di :max caratteri.',
            'writers.required' => 'Gli scrittori sono obbligatori.',
            'writers.max' => 'La lista degli scrittori non può essere più lunga di :max caratteri.',
        ]);

        //$comicData = $request->all();
        //manipolo i dati per poi aggiornali nel db
        $comicData["price"] = floatval( $comicData ['price']);
        $supportArray = explode(",", $comicData ['artists']);
        $comicData["artists"] = json_encode($supportArray);
        $supportArray = explode(",", $comicData ['writers']);
        $comicData["writers"]= json_encode($supportArray);

        $comic->update($comicData);
        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
