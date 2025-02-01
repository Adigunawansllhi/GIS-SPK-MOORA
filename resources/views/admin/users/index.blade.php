@extends('main')

@section('content')
<div class="card m-3 shadow-sm">
    <!-- Card Header -->
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">User Management</h3>
        <div class="d-flex gap-2">
            <a href="{{ route('users.create') }}" class="btn btn-light btn-sm" title="Tambah Data">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
            <a href="#" class="btn btn-light btn-sm" title="Ekspor PDF">
                <i class="fas fa-file-pdf"></i> Ekspor PDF
            </a>
            <a href="#" class="btn btn-light btn-sm" title="Cetak">
                <i class="fas fa-print"></i> Cetak
            </a>
        </div>
    </div>

    <!-- Card Body -->
    <div class="card-body p-0">
        <table class="table table-hover table-striped">
            <thead class="thead-light">
                <tr>
                    <th style="width: 10px">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge bg-{{ $user->role == 'admin' ? 'success' : ($user->role == 'pimpinan' ? 'warning' : 'info') }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-start">
                            <a href="#" class="btn btn-outline-warning btn-sm me-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Card Footer -->
    <div class="card-footer d-flex justify-content-end">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection
