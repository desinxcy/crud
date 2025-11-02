<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="card shadow-sm">
    <!-- Header Biru -->
    <div class="card-header bg-primary text-white fw-semibold">
      ➕ Tambah Mahasiswa
    </div>

    <!-- Body Form -->
    <div class="card-body">
      <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf