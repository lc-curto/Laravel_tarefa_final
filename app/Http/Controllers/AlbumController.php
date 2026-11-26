<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\AlbumsExport;
use Maatwebsite\Excel\Facades\Excel;

class AlbumController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $band = Band::findOrFail($request->band_id);

        return view('albums.create', compact('band'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'image' => 'nullable|image|max:2048',
            'release_date' => 'required|integer|min:1901|max:' . date('Y'),
            'band_id' => 'required|exists:bands,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('albums', 'public');
        }

        Album::create($validated);
        //retornar para lista dos algums da banda em questao
        return redirect()->route('bands.show', $validated['band_id'])
            ->with('success', 'Álbum adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'image' => 'nullable|image|max:2048',
            'release_date' => 'required|integer',
            'band_id' => 'required|exists:bands,id',
            'remove_image' => 'nullable|boolean',
        ]);

        // Se foi selecionada a opção de remover imagem
        if ($request->boolean('remove_image')) {

            if ($album->image) {
                Storage::disk('public')->delete($album->image);
            }

            $validated['image'] = null;
        } elseif ($request->hasFile('image')) {

            // Se foi enviada uma nova imagem, remove a antiga
            if ($album->image) {
                Storage::disk('public')->delete($album->image);
            }

            $validated['image'] = $request->file('image')
                ->store('albums', 'public');
        }

        $album->update($validated);

        return redirect()->route('bands.show', $album->band_id)
            ->with('success', 'Álbum atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $bandId = $album->band_id;

        $album->delete();

        return redirect()->route('bands.show', $bandId)->with('success', 'Álbum apagado com sucesso!');
    }

    public function export()
    {
        return Excel::download(
            new AlbumsExport,
            'albuns.xlsx'
        );
    }
}
