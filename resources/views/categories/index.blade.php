@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

                    <div>
                        <h3 class="fw-bold mb-1">Data Category</h3>
                        <p class="text-muted mb-0">Daftar kategori film</p>
                    </div>

                    <div class="d-flex gap-2">
                        <form method="GET" action="{{ route('categories.index') }}" class="d-flex gap-2">
                            <input type="text" name="search" value="{{ $search }}" class="form-control"
                                placeholder="Cari category...">
                            <button class="btn btn-dark">
                                Cari
                            </button>
                        </form>

                        <a href="{{ route('categories.create') }}" class="btn btn-primary">
                            + Tambah Category
                        </a>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kode</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-semibold">{{ $category->name }}</td>
                                    <td>{{ $category->code }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <a href="{{ route('categories.show', $category->id) }}"
                                                class="btn btn-info btn-sm text-white">
                                                Detail
                                            </a>
                                            
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Yakin ingin menghapus category ini?')"
                                                    class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        Data category belum ada.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $categories->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
