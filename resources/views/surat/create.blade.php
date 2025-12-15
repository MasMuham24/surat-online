@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="mb-3">Tambah Surat</h4>

        <form action="{{ route('surat.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nomor Surat</label>
                <input type="text" name="nomor_surat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi Surat</label>
                <textarea name="isi" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
