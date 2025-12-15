@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <h4 class="mb-4">Daftar Surat Masuk</h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body table-responsive">

                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Judul</th>
                            <th>Pengirim</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($surats as $surat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $surat->nomor_surat }}</td>
                                <td>{{ $surat->judul }}</td>
                                <td>{{ $surat->user->name ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($surat->tanggal)->format('d M Y') }}</td>

                                {{-- STATUS --}}
                                <td>
                                    @if (auth()->user()->role === 'admin')
                                        <form action="{{ route('admin.surat.updateStatus', $surat->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <select name="status"
                                                class="form-select form-select-sm
                                                @if ($surat->status == 'pending') bg-warning text-dark
                                                @elseif($surat->status == 'ditangani') bg-info
                                                @elseif($surat->status == 'disetujui') bg-success text-white
                                                @elseif($surat->status == 'ditolak') bg-danger @endif
                                            "
                                                onchange="this.form.submit()">
                                                <option value="pending" {{ $surat->status == 'pending' ? 'selected' : '' }}>
                                                    Pending
                                                </option>
                                                <option value="ditangani"
                                                    {{ $surat->status == 'ditangani' ? 'selected' : '' }}>
                                                    Ditangani
                                                </option>
                                                <option value="disetujui"
                                                    {{ $surat->status == 'disetujui' ? 'selected' : '' }}>
                                                    Disetujui
                                                </option>
                                                <option value="ditolak"
                                                    {{ $surat->status == 'ditolak' ? 'selected' : '' }}>
                                                    Ditolak
                                                </option>
                                            </select>
                                        </form>
                                    @else
                                        @if ($surat->status === 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif ($surat->status === 'ditangani')
                                            <span class="badge bg-info">Ditangani</span>
                                        @elseif ($surat->status === 'disetujui')
                                            <span class="badge bg-success">Disetujui</span>
                                        @elseif ($surat->status === 'ditolak')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    @endif
                                </td>

                                {{-- AKSI --}}
                                <td>
                                    <a href="{{ route('surat.show', $surat->id) }}" class="btn btn-sm btn-primary">
                                        Detail
                                    </a>

                                    <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?\n\nNomor: {{ $surat->nomor_surat }}\nJudul: {{ $surat->judul }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Hapus Surat
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data surat</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>

    </div>
@endsection
