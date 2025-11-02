<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Export Data Mahasiswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Data Mahasiswa</h2>

    <table>
        <thead>
  <tr>
    <th>ID</th><th>Nama</th><th>NIM</th><th>Email</th><th>Dibuat</th><th>Diubah</th>
  </tr>
</thead>
<tbody>
@foreach($mahasiswa as $m)
  <tr>
    <td>{{ $m->id }}</td>
    <td>{{ $m->nama }}</td>
    <td>{{ $m->nim }}</td>
    <td>{{ $m->email }}</td>
  </tr>
@endforeach
</tbody>
    </table>
</body>
</html>
