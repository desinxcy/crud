<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MahasiswaExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        // Kolom sesuai tabel: id, nama, nim, email, created_at, updated_at
        return Mahasiswa::select('id', 'nama', 'nim', 'email')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Nama', 'NIM', 'Email'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->nama,
            $row->nim,
            $row->email,
        ];
    }
}
