<!DOCTYPE html>
<html>
<head>
  <title>Edit Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h1 class="h3 text-primary mb-4">✏ Edit Mahasiswa</h1>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-6">
          <label class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
          @error('nama') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">NIM</label>
          <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
          @error('nim') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email) }}" required>
          @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-12 d-flex gap-2">
          <button type="submit" class="btn btn-primary">💾 Update</button>
          <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
