<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* === Styling tambahan === */

        /* Rapi bagian bawah tabel */
        .card-footer-lite{
            border-top: 1px solid rgba(0,0,0,.1);
            padding-top: .75rem;
            margin-top: .5rem;
        }
        .pagination{ margin-bottom: 0; }

        /* Tombol utama (Export & Tambah Mahasiswa) */
        .btn-custom {
            background-color: #ffffff;
            color: #198754;
            border: 1px solid #198754;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
        }

        /* Tombol Tambah Mahasiswa tetap warna hijau */
        .btn-add {
            background-color: #ffffff;
            color: #28a745;
            border: 1px solid #28a745;
            transition: all 0.3s ease;
        }

        .btn-add:hover {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
        }

        /* Hover item di dropdown PDF & Excel */
        .dropdown-item:hover span {
            font-weight: 500;
        }
        .dropdown-item[href*="pdf"]:hover {
            background-color: #dc3545 !important;
            color: white !important;
        }
        .dropdown-item[href*="export"]:hover {
            background-color: #198754 !important;
            color: white !important;
        }
    </style>
</head>
<body class="bg-light">
<div class="container py-5">

    <!-- Header + Actions -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <h1 class="h3 text-primary m-0">📋 Daftar Mahasiswa</h1>

        <!-- Form Search -->
        <form action="{{ route('mahasiswa.index') }}" method="GET" class="d-flex gap-2" role="search">
            <input type="text"
                   name="q"
                   value="{{ $q ?? request('q') }}"
                   class="form-control"
                   placeholder="Cari nama / NIM / email">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
            @if(!empty($q ?? request('q')))
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary">Reset</a>
            @endif
        </form>

        <!-- Tombol Aksi Kanan -->
        <div class="d-flex gap-2">
            <!-- Dropdown Export -->
            <div class="btn-group">
                <button type="button" class="btn btn-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Export File
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2"
                           href="{{ route('mahasiswa.pdf', ['q' => ($q ?? request('q'))]) }}">
                            <span>Cetak PDF</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2"
                           href="{{ route('mahasiswa.export', ['q' => ($q ?? request('q'))]) }}">
                             <span>Export Excel</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Tombol Tambah -->
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-add">
                Tambah
            </a>
        </div>
    </div>

    <!-- Tabel Mahasiswa -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle mb-2">
                    <thead class="table-dark text-center">
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th width="150">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($mahasiswa as $m)
                        <tr>
                            <td>{{ $m->nama }}</td>
                            <td>{{ $m->nim }}</td>
                            <td>{{ $m->email }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-warning btn-sm">✏ Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">🗑 Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data mahasiswa.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer tabel: info + pagination -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 card-footer-lite">
                <small class="text-muted">
                    Menampilkan
                    {{ $mahasiswa->firstItem() ?? 0 }}–{{ $mahasiswa->lastItem() ?? 0 }}
                    dari {{ $mahasiswa->total() }} data
                </small>
                {{ $mahasiswa->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
