@extends('main')

@section('content')
<div class="card m-3 shadow-sm rounded">
    <!-- Card Header -->
    <div class="card-header text-white" style="background-color: #010378;">
        <h3 class="card-title mb-0">Tambah User</h3>
    </div>

    <!-- Card Body -->
    <div class="card-body p-4">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan nama">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Masukkan email">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="pimpinan">Pimpinan</option>
                    <option value="masyarakat">Masyarakat</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Masukkan konfirmasi password">
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Kembali</a>
                <button type="submit" class="btn text-white" style="background-color: #010378;">Simpan</button>
            </div>
            @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </form>
    </div>
</div>
@endsection
