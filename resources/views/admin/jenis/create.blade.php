@extends('main')

@section('content')

<div class="card m-3 shadow-sm">
    <div class="card-header" style="background-color: #2c3e50; color: white;">
        <h3 class="card-title mb-0">Tambah Jenis Infrastruktur</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('jenis.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="jenis_infrastruktur" class="form-label" style="color: #2c3e50;">Jenis Infrastruktur</label>
                <input type="text" class="form-control @error('jenis_infrastruktur') is-invalid @enderror" id="jenis_infrastruktur" name="jenis_infrastruktur" value="{{ old('jenis_infrastruktur') }}" required>

                @error('jenis_infrastruktur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('jenis.index') }}" class="btn" style="background-color: #2c3e50; color: white;">Batal</a>
                <button type="submit" class="btn" style="background-color: #2c3e50; color: white;">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
