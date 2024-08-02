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
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $search = $request->get('search');
        $mapel = Mapel::when($search, function ($query, $search) {
            return $query->where('mapel', 'like', "%$search%")
                         ->orWhere('keterangan', 'like', "%$search%");
        })->paginate(10);

        return view('mapel.index', compact('mapel', 'siswa', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Mapel $mapel)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mapel' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $mapel = Mapel::create($validated);

        return response()->json($mapel);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('mapel.show', compact('mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        return response()->json($mapel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $validated = $request->validate([
            'mapel' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $mapel->update($validated);

        return response()->json($mapel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return response()->json(['success' => true]);
    }
}
