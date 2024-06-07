<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Autore;
use App\Models\Editore;
use App\Models\Categoria;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function validateData(Request $request)
    {
        return $request->validate([
            'titolo' => 'required|string|min:3|max:255',
            'autore_id' => 'required|exists:autori,id',
            'editore_id' => 'required',
            'isbn' => 'required|string|max:20',
            'anno' => 'required|integer|min:1900|max:' . date('Y'),
            'lingua' => 'required|string|max:2',
            'prezzo' => 'required|numeric|min:0',
            'category' => 'required|array',
            'category.*' => 'exists:categorie,id',
        ]);
    }

    public function index()
    {
        $autori = Autore::all();
        $editori = Editore::all();
        $categorie = Categoria::all();
        $libri = Libro::all();
        return view('libri.index', compact('libri', 'autori', 'editori', 'categorie'));
    }

    public function index_admin()
    {
        $autori = Autore::all();
        $editori = Editore::all();
        // $libri = Libro::all();
        $libri = Libro::paginate(6);
        return view('admin.libri.index', compact('libri', 'autori', 'editori'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autori = Autore::all();
        $editori = Editore::all();
        $categorie = Categoria::all();
        return view('admin.libri.create', compact('categorie', 'autori', 'editori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    dd($request);
        // validazione
        // dd($request->category);
        // $request->validate([
        //     'titolo' => 'required|string|min:3|max:255',
        //     'autore_id' => 'required',
        //     'editore_id' => 'required',
        //     'isbn' => 'required|string|max:20',
        //     'anno' => 'required|integer|min:1970|max:'.date('Y'),
        //     'lingua' => 'required|string|max:2',
        //     'prezzo' => 'required|numeric'
        // ]);

        // Validazione dei dati
        $validatedData = $this->validateData($request);

        // Creazione di un nuovo libro con i dati validati
        $libro = new Libro;
        $libro->fill($validatedData);

        // $libro->titolo = $request->titolo;
        // $libro->autore_id = $request->autore_id;
        // $libro->editore_id = $request->editore_id;
        // $libro->isbn = $request->isbn;
        // $libro->lingua = $request->lingua;
        // $libro->anno = $request->anno;
        // $libro->prezzo = $request->prezzo;

        $libro->save();
        //aggiungiamo le categorie

        $libro->category()->attach($request->category);
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
        $autori = Autore::all();
        $editori = Editore::all();
        $categorie = Categoria::all();
        $libro = Libro::find($id);
        return view('admin.libri.edit', compact('libro', 'autori', 'editori', 'categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'titolo' => 'required|string|min:3|max:255',
        //     'autore_id' => 'required',
        //     'editore_id' => 'required',
        //     'isbn' => 'required|string|max:20',
        //     'anno' => 'required|integer|min:1970|max:' . date('Y'),
        //     'lingua' => 'required|string|max:2',
        //     'prezzo' => 'required|numeric'
        // ]);

        // Validazione dei dati
        $validatedData = $this->validateData($request);
        // Aggiornamento dei dati del libro con quelli validati

        $libro = Libro::find($id);
        $libro->update($validatedData);
        // $libro->update($request->all());

        // Aggiornamento delle categorie
        $libro->category()->sync($request->category);

        return redirect()->route('admin.libri.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro = Libro::find($id);
        $libro->delete();
        return redirect()->route('admin.libri.index');
    }
}
