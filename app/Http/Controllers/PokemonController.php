<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{

    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemons'));
    }

    public function create()
    {
        return view('pokemon.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'required|numeric|min:0|max:999999',
            'height' => 'required|numeric|min:0|max:999999',
            'hp' => 'required|integer|min:0',
            'attack' => 'required|integer|min:0',
            'defense' => 'required|integer|min:0',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $pokemon = Pokemon::create($request->all());
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public', $fileName);
            $pokemon->update(['photo' => $filePath]);
        }
        return redirect()->route('pokemon.index');
    }


    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }


    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }


    public function update(Request $request, Pokemon $pokemon)
{
    $request->validate([
        'name' => 'required|string|max:255',
        // Other validations...
        'is_legendary' => 'boolean', // Validate as boolean
    ]);

    $pokemon->update([
        'name' => $request->name,
        'species' => $request->species,
        'primary_type' => $request->primary_type,
        'weight' => $request->weight,
        'height' => $request->height,
        'hp' => $request->hp,
        'attack' => $request->attack,
        'defense' => $request->defense,
        'is_legendary' => $request->has('is_legendary') ? true : false, // Check if checkbox is checked
        // Handle photo upload if needed
    ]);

    return redirect()->route('pokemon.index')->with('success', 'Pokemon updated successfully');
}




    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemon.index');
    }
}
