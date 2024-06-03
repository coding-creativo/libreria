@extends('layouts.admin') 

@section('title', 'lista libri')

@section('content')
{{-- @dd($libri) --}}
<h1>Lista dei libri</h1>
<a href="{{ route('admin.libri.create') }} ">Inserisci un nuovo libro</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Titolo</th>
        <th scope="col">Autore</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Operazioni</th>
      </tr>
    </thead>
    <tbody>
      @foreach($libri as $libro)
      <tr>
        <th scope="row"> {{ $libro->titolo }} </th>
        <td>{{ $libro->autore->nome }} {{ $libro->autore->cognome }}</td>
        <td>{{ $libro->prezzo }}</td>
        <td>
          <a href="{{ route('admin.libri.edit', $libro->id) }} ">Modica</a>
          <form action="">
            <input type="submit" value="Cancella">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection