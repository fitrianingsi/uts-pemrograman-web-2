@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning">
            Edit Film
        </div>

        <div class="card-body">

            <form action="{{ route('films.update', $film->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Category</label>

                    <select name="category_id" class="form-select">

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ $film->category_id == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label>Judul Film</label>

                    <input
                        type="text"
                        name="title"
                        value="{{ $film->title }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Director</label>

                    <input
                        type="text"
                        name="director"
                        value="{{ $film->director }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tanggal Rilis</label>

                    <input
                        type="date"
                        name="release_date"
                        value="{{ $film->release_date }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Durasi</label>

                    <input
                        type="number"
                        name="duration"
                        value="{{ $film->duration }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Sinopsis</label>

                    <textarea
                        name="synopsis"
                        rows="4"
                        class="form-control">{{ $film->synopsis }}</textarea>
                </div>

                <button class="btn btn-warning">
                    Update
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