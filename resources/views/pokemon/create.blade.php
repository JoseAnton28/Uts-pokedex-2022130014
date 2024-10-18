@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pokemon Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="species">Species</label>
            <input type="text" class="form-control" name="species" value="{{ old('species') }}" required>
        </div>
        <div class="form-group">
            <label for="primary_type">Primary Type</label>
            <select class="form-control" name="primary_type" required>
                <option disabled selected>Select Type</option>
                <option value="Grass">Grass</option>
                <option value="Fire">Fire</option>
                <option value="Water">Water</option>
                <option value="Bug">Bug</option>
                <option value="Normal">Normal</option>
                <option value="Poison">Poison</option>
                <option value="Electric">Electric</option>
                <option value="Ground">Ground</option>
                <option value="Fairy">Fairy</option>
                <option value="Fighting">Fighting</option>
                <option value="Psychic">Psychic</option>
                <option value="Rock">Rock</option>
                <option value="Ghost">Ghost</option>
                <option value="Ice">Ice</option>
                <option value="Dragon">Dragon</option>
                <option value="Dark">Dark</option>
                <option value="Steel">Steel</option>
                <option value="Flying">Flying</option>
            </select>
        </div>

        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" class="form-control" name="weight" value="{{ old('weight') }}">
        </div>
        <div class="form-group">
            <label for="height">Height</label>
            <input type="number" class="form-control" name="height" value="{{ old('height') }}">
        </div>
        <div class="form-group">
            <label for="hp">HP</label>
            <input type="number" class="form-control" name="hp" value="{{ old('hp') }}">
        </div>
        <div class="form-group">
            <label for="attack">Attack</label>
            <input type="number" class="form-control" name="attack" value="{{ old('attack') }}">
        </div>
        <div class="form-group">
            <label for="defense">Defense</label>
            <input type="number" class="form-control" name="defense" value="{{ old('defense') }}">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="is_legendary" {{ old('is_legendary') ? 'checked' : '' }}>
            <label for="is_legendary">Is Legendary</label>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" name="photo" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
@endsection