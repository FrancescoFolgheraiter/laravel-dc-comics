<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//importazione obj carbon per data
use Carbon\Carbon;
// Models
use App\Models\Comic;
class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comicsData= config('comics');

        foreach ($comicsData as $key => $singleComicData) {
            $comic = new Comic();
            $comic->title = $singleComicData['title'];
            $comic->description = $singleComicData['description'];
            $comic->thumb = $singleComicData['thumb'];
            // questa riga di codice mi permette di eliminare il dollaro e trasformare il valore in float
            $priceSupport = floatval(str_replace('$', '', $singleComicData['price']));
            $comic->price = $priceSupport;
            $comic->series = $singleComicData['series'];
            $comic->sale_date =  $singleComicData['sale_date'];
            $comic->type = $singleComicData['type'];
            $comic->artists = json_encode($singleComicData['artists']);
            $comic->writers= json_encode($singleComicData['writers']);
            $comic->save();
        }
    }
}
