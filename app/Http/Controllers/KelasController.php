<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Validasi data yang diterima
        $validator = Validator::make($request->all(), [
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('kelas.index')
                ->withErrors($validator)
                ->withInput();
        }

        // Cek apakah kombinasi kelas dan jurusan sudah ada
        $exists = Kelas::where('kelas', $request->kelas)
            ->where('jurusan', $request->jurusan)
            ->exists();

        if ($exists) {
            return redirect()->route('kelas.index')
                ->withErrors(['msg' => 'Kelas dan jurusan sudah ada'])
                ->withInput();
        }

        // Jika tidak ada duplikat, simpan data
        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data berhasil ditambahkan.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
