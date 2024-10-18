@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Pokedex</h1>

    <div class="row">
        @foreach ($pokemons as $pokemon)
            <div class="col-md-4 mb-4">
                <div class="card">

                    <a href="{{ route('pokemon.show', $pokemon->id) }}">
                        @if($pokemon->photo)
                            <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}"
                                class="img-fluid rounded-start" alt="{{ $pokemon->name }}">
                        @else
                            <img src="https://placehold.co/200" class="card-img-top" alt="No image available">
                        @endif
                    </a>
                    <div class="card-body text-center">

                        <h5 class="card-title">
                            <a href="{{ route('pokemon.show', $pokemon->id) }}">
                                {{ $pokemon->name }}
                            </a>
                        </h5>
                        <p class="card-text">
                            ID: #{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }} <br>
                            <span class="badge rounded-pill bg-primary">{{ $pokemon->primary_type }}</span>
                        </p>
                        <a href="{{ route('pokemon.show', $pokemon->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="d-flex justify-content-center mt-4">
        {{ $pokemons->links() }}
    </div>
</div>
@endsection