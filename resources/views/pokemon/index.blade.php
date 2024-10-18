@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('pokemon.create') }}" class="btn btn-primary">Tambah Pokemon</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Species</th>
                <th>Primary Type</th>
                <th>Power</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pokemons as $p)
                <tr>
                    <td>{{ str_pad($p->id, 4, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->species }}</td>
                    <td>{{ $p->primary_type }}</td>
                    <td>{{ $p->hp + $p->attack + $p->defense }}</td>
                    <td>
                        <a href="{{ route('pokemon.edit', $p) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pokemon.destroy', $p) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pokemons->links() }}
</div>
@endsection