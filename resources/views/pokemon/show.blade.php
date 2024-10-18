@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pokemon: {{ $pokemon->name }}</h1>

    <div class="card">
        <div class="card-header">
            {{ $pokemon->name }} (#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }})
        </div>
        <div class="card-body">
            <p><strong>Species:</strong> {{ $pokemon->species }}</p>
            <p><strong>Primary Type:</strong> {{ $pokemon->primary_type }}</p>
            <p><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
            <p><strong>Height:</strong> {{ $pokemon->height }} m</p>
            <p><strong>HP:</strong> {{ $pokemon->hp }}</p>
            <p><strong>Attack:</strong> {{ $pokemon->attack }}</p>
            <p><strong>Defense:</strong> {{ $pokemon->defense }}</p>
            <p><strong>Legendary:</strong> {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>

            @if($pokemon->photo)
                <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}"
                    class="img-fluid rounded-start" alt="{{ $pokemon->name }}">
            @else
                <img src="https://placehold.co/200" alt="Placeholder" class="img-thumbnail">
            @endif
        </div>
    </div>
</div>
@endsection