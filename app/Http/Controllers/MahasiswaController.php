<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    // READ + SEARCH + PAGINATION (3/halaman)
    public function index(Request $request)
    {
        $q = trim($request->input('q'));

        $mahasiswa = Mahasiswa::query()
            ->when($q, function ($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%")
                      ->orWhere('nim', 'like', "%{$q}%")
                      ->orWhere('email', 'like', "%{$q}%");
            })
            ->orderByDesc('id')
            ->paginate(3)            // batasi 3 data per halaman
            ->withQueryString();     // pertahankan ?q=... saat navigasi

        return view('mahasiswa.index', compact('mahasiswa', 'q'));
    }

    // CREATE FORM
    public function create()
    {
        return view('mahasiswa.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'nim'   => 'required|unique:mahasiswas',
            'email' => 'required|email|unique:mahasiswas',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success','Data berhasil ditambahkan!');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama'  => 'required',
            'nim'   => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success','Data berhasil diperbarui!');
    }

    // DELETE
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success','Data berhasil dihapus!');
    }

    // PDF (ikut filter q)
    public function cetakPDF(Request $request)
    {
        $q = trim($request->input('q'));

        $mahasiswa = Mahasiswa::query()
            ->when($q, function ($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%")
                      ->orWhere('nim', 'like', "%{$q}%")
                      ->orWhere('email', 'like', "%{$q}%");
            })
            ->orderByDesc('id')
            ->get();

        $pdf = Pdf::loadView('mahasiswa.pdf', compact('mahasiswa'));
        return $pdf->download('daftar_mahasiswa.pdf');
    }

    // EXPORT EXCEL (ikut filter q)
    public function exportExcelView(Request $request)
    {
        $keyword = $request->input('q'); // ambil kata kunci dari form/URL
        return Excel::download(new MahasiswaExport($keyword), 'data_mahasiswa.xlsx');
    }
}
