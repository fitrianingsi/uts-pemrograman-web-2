@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            Tambah Film
        </div>

        <div class="card-body">

            <form action="{{ route('films.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Category</label>

                    <select name="category_id" class="form-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul Film</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Director</label>
                    <input type="text" name="director" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Rilis</label>
                    <input type="date" name="release_date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Durasi (menit)</label>
                    <input type="number" name="duration" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Sinopsis</label>
                    <textarea name="synopsis" rows="4" class="form-control"></textarea>
                </div>

                <button class="btn btn-success">
                    Simpan
                </button>

                <a href="{{ route('films.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>
@endsection