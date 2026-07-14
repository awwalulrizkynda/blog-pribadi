@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">

            Dashboard

        </h2>

        <p class="text-muted mb-0">

            Selamat datang, <strong>{{ auth()->user()->name }}</strong> 👋

        </p>

    </div>

</div>

<div class="row">

    <div class="col-md-3 mb-4">

        <div class="card border-0 shadow text-bg-primary">

            <div class="card-body text-center">

                <i class="bi bi-folder2-open display-5"></i>

                <h5 class="mt-3">

                    Kategori

                </h5>

                <h2>

                    {{ $totalCategory }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card border-0 shadow text-bg-success">

            <div class="card-body text-center">

                <i class="bi bi-file-earmark-text display-5"></i>

                <h5 class="mt-3">

                    Artikel

                </h5>

                <h2>

                    {{ $totalArticle }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card border-0 shadow text-bg-info">

            <div class="card-body text-center">

                <i class="bi bi-check-circle display-5"></i>

                <h5 class="mt-3">

                    Published

                </h5>

                <h2>

                    {{ $published }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card border-0 shadow text-bg-warning">

            <div class="card-body text-center">

                <i class="bi bi-pencil-square display-5"></i>

                <h5 class="mt-3">

                    Draft

                </h5>

                <h2>

                    {{ $draft }}

                </h2>

            </div>

        </div>

    </div>

</div>

<div class="row mt-2">

    <div class="col-md-6 mb-3">

        <a href="{{ route('articles.create') }}"
           class="btn btn-success w-100 py-3">

            <i class="bi bi-plus-circle"></i>

            Tambah Artikel

        </a>

    </div>

    <div class="col-md-6 mb-3">

        <a href="{{ route('categories.create') }}"
           class="btn btn-primary w-100 py-3">

            <i class="bi bi-folder-plus"></i>

            Tambah Kategori

        </a>

    </div>

</div>

<div class="card shadow mt-4">

    <div class="card-header bg-white">

        <h5 class="mb-0">

            Informasi

        </h5>

    </div>

    <div class="card-body">

        <p>

            Selamat datang di aplikasi <strong>Blog Pribadi Laravel</strong>.

        </p>

        <p>

            Melalui dashboard ini Anda dapat:

        </p>

        <ul>

            <li>Mengelola kategori artikel.</li>

            <li>Menambah, mengubah, dan menghapus artikel.</li>

            <li>Mengunggah thumbnail artikel.</li>

            <li>Mengatur status artikel menjadi Draft atau Published.</li>

            <li>Melihat statistik blog.</li>

        </ul>

    </div>

</div>

<div class="card shadow mt-4">

    <div class="card-header bg-white">

        <h5 class="mb-0">

            Ringkasan Statistik

        </h5>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>

                <th width="250">

                    Total Kategori

                </th>

                <td>

                    {{ $totalCategory }}

                </td>

            </tr>

            <tr>

                <th>

                    Total Artikel

                </th>

                <td>

                    {{ $totalArticle }}

                </td>

            </tr>

            <tr>

                <th>

                    Artikel Published

                </th>

                <td>

                    {{ $published }}

                </td>

            </tr>

            <tr>

                <th>

                    Artikel Draft

                </th>

                <td>

                    {{ $draft }}

                </td>

            </tr>

        </table>

    </div>

</div>

@endsection