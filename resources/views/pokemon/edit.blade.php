@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pokemon: {{ $pokemon->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pokemon.update', $pokemon) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $pokemon->name) }}" required>
        </div>
        <div class="form-group">
            <label for="species">Species</label>
            <input type="text" class="form-control" name="species" value="{{ old('species', $pokemon->species) }}"
                required>
        </div>
        <div class="form-group">
            <label for="primary_type">Primary Type</label>
            <select class="form-control" name="primary_type" required>
                <option disabled>Select Type</option>
                <option value="Grass" {{ $pokemon->primary_type == 'Grass' ? 'selected' : '' }}>Grass</option>
                <option value="Fire" {{ $pokemon->primary_type == 'Fire' ? 'selected' : '' }}>Fire</option>
                <option value="Water" {{ $pokemon->primary_type == 'Water' ? 'selected' : '' }}>Water</option>
                <option value="Bug" {{ $pokemon->primary_type == 'Bug' ? 'selected' : '' }}>Bug</option>
                <option value="Normal" {{ $pokemon->primary_type == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Poison" {{ $pokemon->primary_type == 'Poison' ? 'selected' : '' }}>Poison</option>
                <option value="Electric" {{ $pokemon->primary_type == 'Electric' ? 'selected' : '' }}>Electric</option>
                <option value="Ground" {{ $pokemon->primary_type == 'Ground' ? 'selected' : '' }}>Ground</option>
                <option value="Fairy" {{ $pokemon->primary_type == 'Fairy' ? 'selected' : '' }}>Fairy</option>
                <option value="Fighting" {{ $pokemon->primary_type == 'Fighting' ? 'selected' : '' }}>Fighting</option>
                <option value="Psychic" {{ $pokemon->primary_type == 'Psychic' ? 'selected' : '' }}>Psychic</option>
                <option value="Rock" {{ $pokemon->primary_type == 'Rock' ? 'selected' : '' }}>Rock</option>
                <option value="Ghost" {{ $pokemon->primary_type == 'Ghost' ? 'selected' : '' }}>Ghost</option>
                <option value="Ice" {{ $pokemon->primary_type == 'Ice' ? 'selected' : '' }}>Ice</option>
                <option value="Dragon" {{ $pokemon->primary_type == 'Dragon' ? 'selected' : '' }}>Dragon</option>
                <option value="Dark" {{ $pokemon->primary_type == 'Dark' ? 'selected' : '' }}>Dark</option>
                <option value="Steel" {{ $pokemon->primary_type == 'Steel' ? 'selected' : '' }}>Steel</option>
                <option value="Flying" {{ $pokemon->primary_type == 'Flying' ? 'selected' : '' }}>Flying</option>
            </select>
        </div>

        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" class="form-control" name="weight" value="{{ old('weight', $pokemon->weight) }}">
        </div>
        <div class="form-group">
            <label for="height">Height</label>
            <input type="number" class="form-control" name="height" value="{{ old('height', $pokemon->height) }}">
        </div>
        <div class="form-group">
            <label for="hp">HP</label>
            <input type="number" class="form-control" name="hp" value="{{ old('hp', $pokemon->hp) }}">
        </div>
        <div class="form-group">
            <label for="attack">Attack</label>
            <input type="number" class="form-control" name="attack" value="{{ old('attack', $pokemon->attack) }}">
        </div>
        <div class="form-group">
            <label for="defense">Defense</label>
            <input type="number" class="form-control" name="defense" value="{{ old('defense', $pokemon->defense) }}">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="is_legendary" value="1" {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
            <label for="is_legendary" class="form-check-label">Is Legendary</label>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" name="photo" accept="image/*">
            @if($pokemon->photo)
                <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}"
                    class="img-fluid rounded-start" alt="{{ $pokemon->name }}">
            @endif
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection