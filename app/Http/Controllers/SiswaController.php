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
                         ->orWhere('nis', 'like', "%{$search}%")
                         ->orWhereHas('kelas', function ($query) use ($search) {
                             $query->where('kelas', 'like', "%{$search}%")
                                   ->orWhere('jurusan', 'like', "%{$search}%");
                         });
        })
        ->paginate(10); // Sesuaikan jumlah per halaman sesuai kebutuhan Anda

    $totalSiswa = Siswa::count(); // Menghitung jumlah total siswa

    return view('siswa.index', compact('siswa', 'totalSiswa', 'kelas'));
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
        'nis' => 'required|unique:siswas',
        'nama' => 'required',
        'no_telepon' => 'required',
        'kelas_id' => 'required|exists:kelas,id',
    ]);

    $siswa = Siswa::create($validatedData);

    $lastPage = Siswa::paginate(10)->lastPage(); // Ambil nomor halaman terakhir

    return response()->json(['siswa' => $siswa, 'lastPage' => $lastPage]);
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

    // Temukan siswa dengan ID yang diberikan dan lakukan update
    $siswa = Siswa::findOrFail($id);
    $siswa->update($validatedData);

    // Muat relasi kelas
    $siswa->load('kelas');

    return response()->json([
        'id' => $siswa->id,
        'nis' => $siswa->nis,
        'nama' => $siswa->nama,
        'kelas' => [
            'kelas' => $siswa->kelas->kelas,
            'jurusan' => $siswa->kelas->jurusan,
        ],
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
