<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokedexController extends Controller
{

    public function __invoke(Request $request)
    {

        $pokemons = Pokemon::paginate(9);


        return view('pokedex', compact('pokemons'));
    }
}

