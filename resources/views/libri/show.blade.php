@extends('layouts.app') 

@section('title', 'libri')

@section('content')
    <h1> {{ $libro->titolo }} </h1>
    {{-- @dd($libro) --}}
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $libro->autore_id }} </h2>
            <h3>{{ $libro->editore_id }} </h3>
            <p>Prezzo: {{ $libro->prezzo }} </p>
        </div>
    </div>
@endsection