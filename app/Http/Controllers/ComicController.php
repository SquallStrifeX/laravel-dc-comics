<?php

namespace App\Http\Controllers;

use App\Models\Comic; // Assicurati che sia il percorso corretto al modello
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all(); // Recupera tutti i fumetti dal database
        return view('comics.index', compact('comics')); // Passa i fumetti alla vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validazione dei dati in entrata
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'thumb' => 'required|url',
            'price' => 'required|numeric',
            'series' => 'required|string',
            'sale_date' => 'required|date',
            'type' => 'required|string',
            'artists' => 'required|array',
            'writers' => 'required|array',
        ]);

        // Converti gli array in stringhe JSON prima del salvataggio
        $validated['artists'] = json_encode($validated['artists']);
        $validated['writers'] = json_encode($validated['writers']);

        // Crea un nuovo fumetto nel database utilizzando i dati validati
        $comic = Comic::create($validated);

        // Reindirizza l'utente a una pagina appropriata dopo il salvataggio
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic) // Laravel inietta automaticamente il fumetto corrispondente all'ID dell'URL
    {
        return view('comics.show', compact('comic')); // Passa il fumetto alla vista
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
{
    // Passa il fumetto esistente alla vista per la modifica
    return view('comics.edit', compact('comic'));
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        // Converti le stringhe separate da virgole in array
        $request->merge([
            'artists' => explode(',', $request->input('artists')),
            'writers' => explode(',', $request->input('writers')),
        ]);

        // Validazione dei dati in entrata
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'thumb' => 'required|url',
            'price' => 'required|numeric',
            'series' => 'required|string',
            'sale_date' => 'required|date',
            'type' => 'required|string',
            'artists' => 'required|array',
            'writers' => 'required|array',
        ]);

        // Converti gli array in stringhe JSON prima del salvataggio
        $validated['artists'] = json_encode($validated['artists']);
        $validated['writers'] = json_encode($validated['writers']);

        // Aggiorna il fumetto nel database utilizzando i dati validati
        $comic->update($validated);

        // Reindirizza l'utente a una pagina appropriata dopo l'aggiornamento
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        // Codice per eliminare il fumetto
    }
}
