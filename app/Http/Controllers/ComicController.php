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
        $comic->artists = json_encode($comicData ['artists']);
        $comic->writers= json_encode($comicData ['writers']);

        return redirect()->route('pastas.show', ['pasta' => $comic->id]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
