@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                <div>
                    <h3 class="fw-bold mb-1">Data Film</h3>
                    <p class="text-muted mb-0">Daftar film beserta category</p>
                </div>

                <a href="{{ route('films.create') }}" class="btn btn-primary">
                    + Tambah Film
                </a>
            </div>

            <form method="GET" action="{{ route('films.index') }}" class="row g-2 mb-4">
                <div class="col-md-5">
                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        class="form-control"
                        placeholder="Cari judul/director...">
                </div>

                <div class="col-md-4">
                    <select name="category_id" class="form-select">
                        <option value="">Semua Category</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 d-flex gap-2">
                    <button class="btn btn-dark w-100">
                        Cari
                    </button>

                    <a href="{{ route('films.index') }}" class="btn btn-secondary w-100">
                        Reset
                    </a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Category</th>
                            <th>Director</th>
                            <th>Tanggal Rilis</th>
                            <th>Durasi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($films as $film)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $film->title }}</td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $film->category->name ?? '-' }}
                                    </span>
                                </td>
                                <td>{{ $film->director }}</td>
                                <td>{{ $film->release_date }}</td>
                                <td>{{ $film->duration }} menit</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    Data film belum ada.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $films->withQueryString()->links() }}
            </div>

        </div>
    </div>

</div>
@endsection