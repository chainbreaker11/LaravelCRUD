<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animes = Anime::paginate(5); // Paginación de 5 resultados por página
        return view('anime.index', compact('animes'));
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anime.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            'Nombre' => 'required|string|max:100',
            'Alias' => 'required|string|max:100',
            'Edad' => 'required|integer|min:0',
            'Genero' => 'required|string|max:50',
            'Meta' => 'nullable|string|max:255',
            'Foto' => 'required|max:1000|mimes:jpeg,png,jpg',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La foto es requerida',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosAnime = $request->except('_token');
        if ($request->hasFile('Foto')) {
            $datosAnime['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }
        Anime::create($datosAnime);

        return redirect('anime/')->with('mensaje', 'Anime agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime $anime)
    {
        // Implementar si es necesario
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anime = Anime::findOrFail($id);
        return view('anime.edit', compact('anime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Nombre' => 'required|string|max:100',
            'Alias' => 'required|string|max:100',
            'Edad' => 'required|integer|min:0',
            'Genero' => 'required|string|max:50',
            'Meta' => 'nullable|string|max:255',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];

        if ($request->hasFile('Foto')) {
            $campos['Foto'] = 'required|max:1000|mimes:jpeg,png,jpg';
            $mensaje['Foto.required'] = 'La foto es requerida';
        }

        $this->validate($request, $campos, $mensaje);

        $datosAnime = $request->except(['_token', '_method']);

        if ($request->hasFile('Foto')) {
            $anime = Anime::findOrFail($id);
            // Eliminar la foto anterior
            if ($anime->Foto) {
                Storage::delete('public/' . $anime->Foto);
            }
            $datosAnime['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Anime::where('id', $id)->update($datosAnime);

        return redirect('anime')->with('mensaje', 'Anime modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $anime = Anime::findOrFail($id);
        if ($anime->Foto) {
            Storage::delete('public/' . $anime->Foto);
        }
        Anime::destroy($id);

        return redirect('anime')->with('mensaje', 'Anime eliminado con éxito');
    }
}
