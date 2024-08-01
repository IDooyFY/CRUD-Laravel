<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $siswa = Siswa::all();
        $search = $request->input('search');

        $query = Kelas::query();

        if ($search) {
            $query->where('kelas', 'like', '%' . $search . '%')
                  ->orWhere('jurusan', 'like', '%' . $search . '%');
        }

        $kelas = $query->paginate(10);
        return view('kelas.index', compact('kelas', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new Kelas
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'kelas' => 'required|string|max:255',
        'jurusan' => 'required|string|max:255',
    ]);

    // Check for duplicate records
    $exists = Kelas::where('kelas', $validatedData['kelas'])
        ->where('jurusan', $validatedData['jurusan'])
        ->exists();

    if ($exists) {
        return response()->json(['error' => 'Kelas dan jurusan sudah ada'], 400);
    }

    $kelas = Kelas::create($validatedData);

    // Menghitung jumlah siswa
    $siswaCount = Siswa::where('kelas_id', $kelas->id)->count();

    return response()->json([
        'id' => $kelas->id,
        'kelas' => $kelas->kelas,
        'jurusan' => $kelas->jurusan,
        'siswa_count' => $siswaCount
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Show the details of a specific Kelas
        $kelas = Kelas::findOrFail($id);
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    // Return JSON response for AJAX request
    $kelas = Kelas::findOrFail($id);
    return response()->json($kelas);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'kelas' => ['required', 'string', 'max:255', Rule::in(['Kelas 10', 'Kelas 11', 'Kelas 12'])],
        'jurusan' => 'required|string|max:255',
    ]);

    $kelas = Kelas::findOrFail($id);
    $kelas->update($validatedData);

    // Menghitung jumlah siswa pada kelas tersebut
    $jumlahSiswa = Siswa::where('kelas_id', $kelas->id)->count();

    return response()->json([
        'kelas' => $kelas,
        'jumlah_siswa' => $jumlahSiswa
    ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return response()->json(['success' => true]);
    }
}
