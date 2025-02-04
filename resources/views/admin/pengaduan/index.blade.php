@extends('main')

@section('content')

<div class="card m-3 shadow-sm">
    <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #2c3e50">
        <h3 class="card-title mb-0">Daftar Pengaduan Infrastruktur</h3>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelapor</th>
                        <th>No HP</th>
                        <th>Nama Infrastruktur</th>
                        <th>Jenis Infrastruktur</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengaduan as $key => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->nama_infrastruktur }}</td>
                        <td>{{ $item->jenisInfrastruktur->jenis_infrastruktur ?? '-' }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">


                                <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                                    <i class="fas fa-info-circle"></i>
                                </button>

                                <!-- Tombol Hapus dengan SweetAlert -->
                                <form action="{{ route('pengaduan.delete', $item->id) }}" method="POST" onsubmit="return confirmDelete(event, {{ $item->id }})">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
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
    </div>

</div>

<!-- Modal Detail untuk setiap item -->
@foreach($pengaduan as $item)
<div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #2c3e50;">
                <h5 class="modal-title"><i class="fas fa-info-circle me-2"></i> Detail Pengaduan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <th>Nama Pelapor</th>
                        <td>{{ $item->nama }}</td>
                    </tr>
                    <tr>
                        <th>No HP</th>
                        <td>{{ $item->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Nama Infrastruktur</th>
                        <td>{{ $item->nama_infrastruktur }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Infrastruktur</th>
                        <td>{{ $item->jenisInfrastruktur->jenis_infrastruktur ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $item->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $item->deskripsi }}</td>
                    </tr>
                </table>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-camera me-2"></i> Foto</h5>
                        @if($item->upload_foto)
                            <img src="{{ asset('uploads/' . $item->upload_foto) }}" class="img-fluid rounded shadow" alt="Foto Bukti">
                        @else
                            <p class="text-muted">Tidak ada foto bukti.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    function confirmDelete(event, id) {
        event.preventDefault();

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data pengaduan akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });
    }
</script>

@endsection
