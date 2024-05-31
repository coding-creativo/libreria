<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libri = Libro::all();
        return view('libri.index', compact('libri'));
    }

    public function index_admin()
    {
        $libri = Libro::all();
        return view('admin.libri.index', compact('libri'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.libri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    dd($request);
        // validazione
        $libro = new Libro;
        $libro->titolo = $request->titolo;
        $libro->autore_id = $request->autore_id;
        $libro->editore_id = $request->editore_id;
        $libro->isbn = $request->isbn;
        $libro->lingua = $request->lingua;
        $libro->anno = $request->anno;
        $libro->prezzo = $request->prezzo;

        $libro->save(); 

        return redirect()->route('admin.libri.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $libro = Libro::find($id);
        return view('libri.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
