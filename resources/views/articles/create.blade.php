@extends('layouts.app')

@section('title','Tambah Artikel')

@section('content')

<div class="card shadow">

    <div class="card-header">

        <h4>Tambah Artikel</h4>

    </div>

    <div class="card-body">

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('articles.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Judul Artikel

                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Kategori

                </label>

                <select
                    name="category_id"
                    class="form-select"
                    required>

                    <option value="">-- Pilih Kategori --</option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}">

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Thumbnail

                </label>

                <input
                    type="file"
                    name="thumbnail"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Isi Artikel

                </label>

                <textarea
                    name="content"
                    rows="10"
                    class="form-control"
                    required>{{ old('content') }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Status

                </label>

                <select
                    name="status"
                    class="form-select">

                    <option value="draft">

                        Draft

                    </option>

                    <option value="published">

                        Published

                    </option>

                </select>

            </div>

            <button
                class="btn btn-primary">

                Simpan

            </button>

            <a href="{{ route('articles.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection