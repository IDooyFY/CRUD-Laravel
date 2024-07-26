<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');
        $siswa = Siswa::all();
        $kelas = Kelas::all();

    $mapel = Mapel::query()
                ->where('mapel', 'LIKE', "%{$search}%")
                ->orWhere('guru', 'LIKE', "%{$search}%")
                ->get();

    return view('mapel.index', compact('mapel', 'kelas', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Mapel $mapel)
    {

        Mapel::create($request->all());
        return redirect()->route('mapel.index')->with('success', 'Data mapel berhasil diperbarui.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $request->validate([
            'mapel' => 'required|string',
            'guru' => 'required|string',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->mapel = $request->input('mapel');
        $mapel->guru = $request->input('guru');
        $mapel->save();

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil dihapus');
    }
}
