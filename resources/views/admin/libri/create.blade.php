@extends('layouts.admin') 

@section('title', 'lista libri')

@section('content')
<div class="container">
    <h1>Inserimento Libro</h1>
    <form action="{{ route('admin.libri.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="mb-3">
          <label for="titolo" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="titolo" name="titolo" >
        </div>
        <div class="mb-3">
            <label for="autore_id" class="form-label">Autore</label>
            <input type="text" class="form-control" id="autore_id" name="autore_id" >
        </div>
        <div class="mb-3">
            <label for="editore_id" class="form-label">Editore</label>
            <input type="text" class="form-control" id="editore_id" name="editore_id" >
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" >
        </div>
        <div class="mb-3">
            <label for="lingua" class="form-label">Lingua</label>
            <input type="text" class="form-control" id="lingua" name="lingua" >
        </div>
        <div class="mb-3">
            <label for="anno" class="form-label">Anno</label>
            <input type="text" class="form-control" id="anno" name="anno" >
        </div>
        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="prezzo" name="prezzo" >
        </div>        
        <button type="submit" class="btn btn-primary">Invia</button>
      </form>
</div>

@endsection