@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Hero -->
<div class="bg-primary text-white rounded-4 p-5 mb-5 shadow">

    <div class="row align-items-center">

        <div class="col-lg-8">

            <h1 class="display-5 fw-bold">

                Selamat Datang di Blog Pribadi

            </h1>

            <p class="lead">

                Blog sederhana yang dibuat menggunakan Laravel 13 dan Bootstrap 5.
                Berisi berbagai artikel mengenai pemrograman, Laravel, teknologi,
                database, dan topik menarik lainnya.

            </p>

            <a href="#artikel" class="btn btn-light btn-lg">

                <i class="bi bi-book"></i>

                Lihat Artikel

            </a>

        </div>

        <div class="col-lg-4 text-center">

            <i class="bi bi-journal-richtext"
               style="font-size:120px;"></i>

        </div>

    </div>

</div>

<h2 id="artikel" class="mb-4">

    Artikel Terbaru

</h2>

<!-- Search -->
<div class="card shadow-sm mb-4">

    <div class="card-body">

        <form action="{{ route('home') }}" method="GET">

            <div class="row g-2">

                <div class="col-md-5">

                    <input
                        type="text"
                        class="form-control"
                        name="search"
                        placeholder="Cari artikel..."
                        value="{{ request('search') }}">

                </div>

                <div class="col-md-4">

                    <select
                        name="category"
                        class="form-select">

                        <option value="">

                            Semua Kategori

                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-3">

                    <button
                        class="btn btn-primary w-100">

                        <i class="bi bi-search"></i>

                        Cari

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@if($articles->count())

<div class="row">

    @foreach($articles as $article)

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card h-100 shadow-sm">

            @if($article->thumbnail)

                <img
                    src="{{ asset('storage/'.$article->thumbnail) }}"
                    class="card-img-top"
                    style="height:220px; object-fit:cover;">

            @else

                <img
                    src="https://via.placeholder.com/600x300?text=No+Image"
                    class="card-img-top"
                    style="height:220px; object-fit:cover;">

            @endif

            <div class="card-body">

                <span class="badge bg-primary mb-2">

                    {{ $article->category->name }}

                </span>

                <h5 class="card-title fw-bold">

                    {{ $article->title }}

                </h5>

                <small class="text-muted">

                    <i class="bi bi-calendar-event"></i>

                    {{ $article->created_at->format('d M Y') }}

                </small>

                <hr>

                <p class="card-text">

                    {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}

                </p>

            </div>

            <div class="card-footer bg-white border-0">

                <a
                    href="{{ route('article.show', $article->slug) }}"
                    class="btn btn-primary w-100">

                    Baca Selengkapnya

                </a>

            </div>

        </div>

    </div>

    @endforeach

</div>

<div class="d-flex justify-content-center mt-4">

    {{ $articles->links() }}

</div>

@else

<div class="alert alert-warning text-center">

    <h5 class="mb-0">

        Artikel tidak ditemukan.

    </h5>

</div>

@endif

@endsection