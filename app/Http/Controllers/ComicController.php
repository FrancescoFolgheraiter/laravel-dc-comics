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
        $comicData = $request->all();

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
        $comicData = $request->all();
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
