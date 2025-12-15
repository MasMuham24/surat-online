@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-file-alt"></i> Detail Surat
                        </h4>
                        <a href="{{ route('surat.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>

                <!-- Content Card -->
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <!-- Nomor Surat -->
                        <div class="row mb-4 pb-3 border-bottom">
                            <div class="col-md-3">
                                <strong class="text-muted">
                                    <i class="fas fa-hashtag"></i> Nomor Surat:
                                </strong>
                            </div>
                            <div class="col-md-9">
                                <span class="badge bg-primary fs-6">{{ $surat->nomor_surat }}</span>
                            </div>
                        </div>

                        <!-- Judul -->
                        <div class="row mb-4 pb-3 border-bottom">
                            <div class="col-md-3">
                                <strong class="text-muted">
                                    <i class="fas fa-heading"></i> Judul:
                                </strong>
                            </div>
                            <div class="col-md-9">
                                <h5 class="mb-0">{{ $surat->judul }}</h5>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="row mb-4 pb-3 border-bottom">
                            <div class="col-md-3">
                                <strong class="text-muted">
                                    <i class="fas fa-calendar-alt"></i> Tanggal:
                                </strong>
                            </div>
                            <div class="col-md-9">
                                {{ \Carbon\Carbon::parse($surat->tanggal)->isoFormat('dddd, D MMMM YYYY') }}
                            </div>
                        </div>

                        <!-- User (jika ada) -->
                        @if ($surat->user)
                            <div class="row mb-4 pb-3 border-bottom">
                                <div class="col-md-3">
                                    <strong class="text-muted">
                                        <i class="fas fa-user"></i> Dibuat Oleh:
                                    </strong>
                                </div>
                                <div class="col-md-9">
                                    <span class="badge bg-success">{{ $surat->user->name }}</span>
                                </div>
                            </div>
                        @endif

                        <!-- Isi Surat -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <strong class="text-muted d-block mb-3">
                                    <i class="fas fa-file-alt"></i> Isi Surat:
                                </strong>
                                <div class="border rounded p-4 bg-light" style="min-height: 200px;">
                                    <div style="white-space: pre-wrap; font-size: 1rem; line-height: 1.8;">
                                        {{ $surat->isi }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Metadata -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="alert alert-info d-flex align-items-center" role="alert">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <div class="small">
                                        <strong>Dibuat:</strong>
                                        {{ $surat->created_at ? $surat->created_at->format('d M Y, H:i') : '-' }}
                                        |
                                        <strong>Terakhir Diupdate:</strong>
                                        {{ $surat->updated_at ? $surat->updated_at->format('d M Y, H:i') : '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2 flex-wrap">

                            <button type="button" class="btn btn-info" onclick="window.print()">
                                <i class="fas fa-print"></i> Cetak Surat
                            </button>

                            <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?\n\nNomor: {{ $surat->nomor_surat }}\nJudul: {{ $surat->judul }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Hapus Surat
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            @media print {

                .btn,
                .card-header,
                .alert,
                .border-bottom {
                    display: none !important;
                }

                .card {
                    border: none !important;
                    box-shadow: none !important;
                }
            }
        </style>
    @endpush
@endsection
