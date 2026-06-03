@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            Tambah Category
        </div>

        <div class="card-body">

            <form action="{{ route('categories.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        Nama Category
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Kode Category
                    </label>

                    <input type="text"
                           name="code"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="description"
                              rows="4"
                              class="form-control"></textarea>
                </div>

                <button class="btn btn-success">
                    Simpan
                </button>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>
@endsection