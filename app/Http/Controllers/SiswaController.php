<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kelas;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kelas = Kelas::all();
        $siswa = Siswa::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                             ->orWhere('nis', 'like', "%{$search}%");
            })
            ->get();

        $kelas = Kelas::all(); // Jangan lupa untuk mengambil data kelas
        return view('siswa.index', compact('siswa', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nis' => 'required|numeric',
        'nama' => 'required|string|max:255',
        'kelas_id' => 'required|exists:kelas,id',
        'no_telepon' => 'required|string|max:15',
    ]);

    $siswa = Siswa::create($validatedData);

    return response()->json([
        'id' => $siswa->id,
        'nis' => $siswa->nis,
        'nama' => $siswa->nama,
        'kelas' => $siswa->kelas->kelas,
        'jurusan' => $siswa->kelas->jurusan,
        'no_telepon' => $siswa->no_telepon
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nis' => 'required|numeric',
        'nama' => 'required|string|max:255',
        'kelas_id' => 'required|exists:kelas,id',
        'no_telepon' => 'required|string|max:15',
    ]);

    $siswa = Siswa::findOrFail($id);
    $siswa->update($validatedData);
    $siswa = Siswa::with('kelas')->findOrFail($id);

    return response()->json([
        'id' => $siswa->id,
        'nis' => $siswa->nis,
        'nama' => $siswa->nama,
        'kelas' => $siswa->kelas->kelas,
        'jurusan' => $siswa->kelas->jurusan,
        'no_telepon' => $siswa->no_telepon
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return response()->json(['success' => 'Record has been deleted']);
    }


}
