@extends('layouts.app')

@section('title','Edit Artikel')

@section('content')

<div class="card shadow">

    <div class="card-header">

        <h4>Edit Artikel</h4>

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

        <form action="{{ route('articles.update',$article) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">

                    Judul Artikel

                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title',$article->title) }}"
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

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ $article->category_id==$category->id?'selected':'' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Thumbnail Lama

                </label>

                <br>

                @if($article->thumbnail)

                    <img
                        src="{{ asset('storage/'.$article->thumbnail) }}"
                        width="200"
                        class="img-thumbnail">

                @else

                    Tidak ada thumbnail

                @endif

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Ganti Thumbnail

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
                    required>{{ old('content',$article->content) }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Status

                </label>

                <select
                    name="status"
                    class="form-select">

                    <option
                        value="draft"
                        {{ $article->status=='draft'?'selected':'' }}>

                        Draft

                    </option>

                    <option
                        value="published"
                        {{ $article->status=='published'?'selected':'' }}>

                        Published

                    </option>

                </select>

            </div>

            <button class="btn btn-warning">

                Update

            </button>

            <a href="{{ route('articles.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection