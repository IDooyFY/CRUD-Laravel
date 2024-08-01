<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $guru = Guru::all();
        $gurus = Guru::query()
            ->where('nama', 'LIKE', "%{$search}%")
            ->orWhere('no_induk', 'LIKE', "%{$search}%")
            ->orWhere('alamat', 'LIKE', "%{$search}%")
            ->orWhere('no_telepon', 'LIKE', "%{$search}%")
            ->paginate(10); // Misalnya 10 item per halaman

        return view('guru', compact('gurus', 'kelas', 'siswa' , 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_induk' => 'required|numeric|unique:gurus,no_induk',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        // Buat Guru baru
        $guru = Guru::create($validatedData);

        // Kembalikan respon JSON
        return response()->json($guru, 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        // Kembalikan data guru dalam format JSON
        $gurus = Guru::findOrFail($id);
        return response()->json($gurus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        // Validate data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_induk' => 'required|numeric',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        // Update Guru data
        $guru->update($validatedData);

        // Return JSON response
        return response()->json($guru);
    }

    public function show(string $id)
    {
        // Show the details of a specific Kelas
        $gurus = Guru::findOrFail($id);
        return view('guru.show', compact('gurus'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return response()->json(['message' => 'Guru deleted successfully'], 200);
    }
}

