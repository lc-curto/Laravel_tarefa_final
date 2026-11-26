<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\BandsExport;
use Maatwebsite\Excel\Facades\Excel;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchPar = $request->input('search');

        $bands = Band::withCount('albums')
            ->when($searchPar, function ($query, $searchPar) {
                $query->where('name', 'like', "%{$searchPar}%");
            })
            ->get();

        return view('bands.index', compact('bands', 'searchPar'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('bands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('bands', 'public');
        }

        Band::create($validated);

        return redirect()->route('bands.all')
            ->with('success', 'Banda adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Band $band)
    {
        $searchPar = request()->query('search')
            ? request()->query('search')
            : null;

        $query = $band->albums();

        if ($searchPar) {
            $query->where('name', 'LIKE', "%{$searchPar}%");
        }

        $albums = $query->get();

        return view('bands.show', compact('band', 'albums', 'searchPar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Band $band)
    {
        return view('bands.edit', compact('band'));
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Band $band)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'image' => 'nullable|image|max:2048',
            'remove_image' => 'nullable|boolean',
        ]);

        // Se foi selecionada a opção de remover imagem
        if ($request->boolean('remove_image')) {

            if ($band->image) {
                Storage::disk('public')->delete($band->image);
            }

            $validated['image'] = null;
        } elseif ($request->hasFile('image')) {

            // Se foi enviada uma nova imagem, remove a antiga
            if ($band->image) {
                Storage::disk('public')->delete($band->image);
            }

            $validated['image'] = $request->file('image')
                ->store('bands', 'public');
        }

        $band->update($validated);

        return redirect()->route('bands.all')
            ->with('success', 'Banda atualizada com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Band $band)
    {
        if ($band->albums()->exists()) {
            return redirect()->route('bands.all')
                ->with('error', 'Não é possível apagar esta banda porque existem álbuns associados.');
        }

        $band->delete();

        return redirect()->route('bands.all')->with('success', 'Banda apagada com sucesso!');
    }

    public function export()
    {
        return Excel::download(
            new BandsExport,
            'bandas.xlsx'
        );
    }
}
