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
    public function index()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('siswa.index', compact('siswa', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambahkan.');
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
    public function update(Request $request, Siswa $siswa)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nis' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        // Perbarui data siswa
        $siswa->update($validatedData);

        // Redirect atau respon sesuai kebutuhan
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
