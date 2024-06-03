@extends('layouts.admin') 

@section('title', 'modifica libro')

@section('content')
<div class="container">
    <h1>Modifica Libro</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- @dd($libro) --}}
    <form action="{{ route('admin.libri.update', $libro->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="titolo" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="titolo" name="titolo" value="{{ $libro->titolo }}">
          @error('titolo')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>
        <div class="mb-3">
            <label for="autore_id" class="form-label">Autore</label>
            <input type="text" class="form-control" id="autore_id" name="autore_id" value="{{ $libro->autore_id }}">
        </div>
        <div class="mb-3">
            <label for="editore_id" class="form-label">Editore</label>
            <input type="text" class="form-control" id="editore_id" name="editore_id" value="{{ $libro->editore_id }}">
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $libro->isbn }}">
        </div>
        <div class="mb-3">
            <label for="lingua" class="form-label">Lingua</label>
            <input type="text" class="form-control" id="lingua" name="lingua" value="{{ $libro->lingua }}">
        </div>
        <div class="mb-3">
            <label for="anno" class="form-label">Anno</label>
            <input type="text" class="form-control" id="anno" name="anno" value="{{ $libro->anno }}">
        </div>
        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="prezzo" name="prezzo" value="{{ $libro->prezzo }}">
        </div>        
        <button type="submit" class="btn btn-primary">Invia</button>
      </form>
</div>

@endsection