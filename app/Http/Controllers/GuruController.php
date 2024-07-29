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
        {
            $search = $request->input('search');
            $kelas = Kelas::all();
            $siswa = Siswa::all();
            $guru = Guru::all();
        $guru = Guru::query()
            ->where('nama', 'LIKE', "%{$search}%")
            ->orWhere('no_induk', 'LIKE', "%{$search}%")
            ->orWhere('alamat', 'LIKE', "%{$search}%")
            ->orWhere('no_telepon', 'LIKE', "%{$search}%")
            ->get();

        return view('guru', compact('guru', 'kelas', 'siswa'));
    }
}


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Guru::create($request->all());
        return redirect()->route('guru')->with('success', 'Data berhasil ditambahkan.');
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
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_induk' => 'required|numeric',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
        ]);

        // Perbarui data siswa
        $guru->update($validatedData);

        // Redirect atau respon sesuai kebutuhan
        return redirect()->route('guru')->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru')->with('success', 'Guru berhasil dihapus');
    }
}
