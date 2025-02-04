@extends('main')
@section('content')

<div class="card m-3 shadow-sm">
    <!-- Card Header -->
    <div class="card-header  text-white d-flex justify-content-between align-items-center" style="background-color: #2c3e50;">
        <h3 class="card-title mb-0">Data Jenis Infrastruktur</h3>
        <div class="d-flex gap-2">
            <a href="{{ route('jenis.create') }}" class="btn btn-light btn-sm" title="Tambah Data">
                <i class="fa fa-plus"></i> Tambah Data
            </a>
        </div>
    </div>

    <!-- Card Body -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <!-- Tabel Data -->
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Infrastruktur</th>
                        <th class="text-center">Aksi</th> <!-- Menambahkan text-center di header untuk meratakan dengan isi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenis_infrastrukturs as $jenis)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jenis->jenis_infrastruktur }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('jenis.edit', $jenis->id) }}" class="btn btn-outline-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Tombol Hapus -->
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete" data-id="{{ $jenis->id }}" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                                <!-- Form Delete -->
                                <form id="delete-form-{{ $jenis->id }}" action="{{ route('jenis.delete', $jenis->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Event listener untuk tombol hapus
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                let id = this.getAttribute('data-id'); // Ambil ID dari tombol
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit(); // Submit form jika dikonfirmasi
                    }
                });
            });
        });
    });
</script>

@endsection
