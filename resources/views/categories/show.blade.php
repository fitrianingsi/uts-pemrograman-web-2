@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h3 class="fw-bold mb-3">Detail Category</h3>

            <p><strong>Nama:</strong> {{ $category->name }}</p>
            <p><strong>Kode:</strong> {{ $category->code }}</p>
            <p><strong>Deskripsi:</strong> {{ $category->description }}</p>
            <p><strong>Jumlah Film:</strong> {{ $category->films->count() }}</p>

            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Daftar Film dalam Category Ini</h5>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul Film</th>
                            <th>Director</th>
                            <th>Tanggal Rilis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($category->films as $film)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $film->title }}</td>
                                <td>{{ $film->director }}</td>
                                <td>{{ $film->release_date }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum ada film pada category ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection