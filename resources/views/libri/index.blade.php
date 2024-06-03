{{-- Gli diciamo quale layout prendere --}}
@extends('layouts.app') 

@section('title', 'libri')

@section('content')
<div>
    {{-- @dd($libri) --}}
    {{-- @dd($autori) --}}
    <h1>Questa è la pagina dei libri</h1>
    <div class="row">
        @foreach($libri as $libro)
        {{-- @dd($libro) --}}
        {{-- @dd($categorie) --}}
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"> {{$libro->titolo}} </h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary">Autore: {{$libro->autore->nome}} {{$libro->autore->cognome}} </h6>
                  <h6 class="card-subtitle mb-2 text-body-secondary">Editore: {{$libro->editore->denominazione}} </h6>
                  <p class="card-text">Prezzo: {{$libro->prezzo}}</p>
                  @if($libro->category->isNotEmpty())
                  <p class="card-text">Categorie:
                    @foreach($libro->category as $categoria)
                    {{ $categoria->nome }} 
                    @unless($loop->last), @endunless
                    @endforeach
                  </p>
                  @endif
                  <a href="{{ route('libri.show', $libro->id)}}" class="card-link">Mostra dettagli</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection