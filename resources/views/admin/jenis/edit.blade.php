@extends('main')

@section('content')

<div class="card m-3 shadow-sm">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title mb-0">Edit Jenis Infrastruktur</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('jenis.update', $jenis->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="jenis_infrastruktur" class="form-label">Jenis Infrastruktur</label>
                <input type="text" class="form-control @error('jenis_infrastruktur') is-invalid @enderror"
                       id="jenis_infrastruktur"
                       name="jenis_infrastruktur"
                       value="{{ old('jenis_infrastruktur', $jenis->jenis_infrastruktur) }}"
                       required>

                @error('jenis_infrastruktur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
