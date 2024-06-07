@extends('layouts.admin') 

@section('title', 'lista libri')

@section('content')
{{-- @dd($categorie) --}}
<div class="container">
    <h1>Inserimento Libro</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.libri.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="mb-3">
          <label for="titolo" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="titolo" name="titolo" required>
          @error('titolo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="autore_id" class="form-label">Autore</label>
            <select name="autore_id" id="autore_id" class="form-control">
                @foreach($autori as $autore)
                    <option value="{{ $autore->id}}">{{ $autore->nome}} {{ $autore->cognome}}</option>
                @endforeach
            </select>

        </div>
        <div class="mb-3">
            <label for="editore_id" class="form-label">Editore</label>
            <select name="editore_id" id="editore_id" class="form-control">
                @foreach($editori as $editore)
                <option value="{{ $editore->id}}">{{ $editore->denominazione}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="mb-3">
            <label for="lingua" class="form-label">Lingua</label>
            <input type="text" class="form-control" id="lingua" name="lingua" required>
        </div>
        <div class="mb-3">
            <label for="anno" class="form-label">Anno</label>
            <input type="text" class="form-control" id="anno" name="anno" required>
        </div>
        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="prezzo" name="prezzo" required>
        </div> 
        <div class="mb-3">
            @foreach($categorie as $categoria)
            <input type="checkbox" id="categoria_{{$categoria->id}}" name="category[]" value="{{$categoria->id}}">
            <label for="categoria_{{$categoria->id}}"> {{ $categoria->nome }} </label>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
      </form>
</div>

@endsection